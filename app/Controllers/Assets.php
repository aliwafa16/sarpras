<?php

namespace App\Controllers;

use \App\Models\LocationModel;
use \App\Models\BrandModel;
use \App\Models\CategoryModel;
use \App\Models\ConditionModel;
use \App\Models\MainCategoryModel;
use \App\Models\TypeBrandModel;
use \App\Models\AssetsModel;
use \App\Models\StatusModel;
use \Config\Database;

$pager = \Config\Services::pager();

// use \Codeigniter\Endroid\Qer

use \Endroid\QrCode\Color\Color;
use \Endroid\QrCode\Encoding\Encoding;
use \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use \Endroid\QrCode\QrCode;
use \Endroid\QrCode\Label\Label;
use \Endroid\QrCode\Logo\Logo;
use \Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use \Endroid\QrCode\Writer\PngWriter;
use \Endroid\QrCode\Writer\ValidationException;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Assets extends BaseController
{

    protected $modelLocation;
    protected $modelBrand;
    protected $modelCategory;
    protected $modelCondition;
    protected $modelMainCategory;
    protected $modelTypeBrand;
    protected $modelStatus;
    protected $modelAssets;
    protected $db;


    public function __construct()
    {
        $this->modelLocation = new LocationModel();
        $this->modelBrand =  new BrandModel();
        $this->modelCategory =  new CategoryModel();
        $this->modelCondition = new ConditionModel();
        $this->modelMainCategory = new MainCategoryModel();
        $this->modelTypeBrand =  new TypeBrandModel();
        $this->modelStatus = new StatusModel();
        $this->modelAssets = new AssetsModel();
        $this->db = Database::connect();
    }
    public function index()
    {
        $data = array();
        $data['filter_search'] =  false;
        if ($this->request->getVar('search') || $this->request->getVar('filter')) {
            $data['filter_search'] =  true;

            $builder = $this->db->table('tbl_assets');
            $builder->join('tbl_brand', 'tbl_brand.id_brand=tbl_assets.brand_id', 'left');
            $builder->join('tbl_location', 'tbl_location.id_location=tbl_assets.location_id', 'left');
            $builder->join('tbl_category', 'tbl_category.id_category=tbl_assets.category_id', 'left');
            $builder->join('tbl_main_category', 'tbl_main_category.id_main_category=tbl_assets.main_category_id', 'left');
            $builder->join('tbl_status', 'tbl_status.id_status=tbl_assets.status_id', 'left');
            $builder->join('tbl_condition', 'tbl_condition.id_condition=tbl_assets.condition_id', 'left');
            $builder->join('tbl_type_brand', 'tbl_type_brand.id_type_brand=tbl_assets.type_brand_id', 'left');

            if ($this->request->getVar('search')) $builder->like('tbl_assets.name_assets', $this->request->getVar('assets'));
            if ($this->request->getVar('filter')) {

                // dd($this->request->getVar());

                if ($this->request->getVar('main_category_id') != 0) $builder->where('tbl_assets.main_category_id', $this->request->getVar('main_category_id'));
                if ($this->request->getVar('category_id') != 0) $builder->where('tbl_assets.category_id', $this->request->getVar('category_id'));
                if ($this->request->getVar('location_id') != 0) $builder->where('tbl_assets.location_id', $this->request->getVar('location_id'));
                if ($this->request->getVar('condition_id') != 0) $builder->where('tbl_assets.condition_id', $this->request->getVar('condition_id'));
                if ($this->request->getVar('type_brand_id') != 0) $builder->where('tbl_assets.type_brand_id', $this->request->getVar('type_brand_id'));
            }
            $results = $builder->get()->getResultArray();
        } else {
            $results = $this->modelAssets->select('*')
                ->join('tbl_brand', 'tbl_brand.id_brand=tbl_assets.brand_id', 'left')
                ->join('tbl_location', 'tbl_location.id_location=tbl_assets.location_id', 'left')
                ->join('tbl_category', 'tbl_category.id_category=tbl_assets.category_id', 'left')
                ->join('tbl_main_category', 'tbl_main_category.id_main_category=tbl_assets.main_category_id', 'left')
                ->join('tbl_status', 'tbl_status.id_status=tbl_assets.status_id', 'left')
                ->join('tbl_condition', 'tbl_condition.id_condition=tbl_assets.condition_id', 'left')
                ->join('tbl_type_brand', 'tbl_type_brand.id_type_brand=tbl_assets.type_brand_id', 'left')
                ->paginate(6, 'tbl_assets');
        }


        $data['assets'] = $results;

        $data['location'] = $this->modelLocation->findAll();
        $data['brand'] = $this->modelBrand->findAll();
        $data['category'] = $this->modelCategory->findAll();
        $data['condition'] = $this->modelCondition->findAll();
        $data['status'] = $this->modelStatus->findAll();
        $data['type_brand'] = $this->modelTypeBrand->select('*')->join('tbl_brand', 'tbl_type_brand.brand_id = tbl_brand.id_brand')->findAll();;
        $data['main_category'] = $this->modelMainCategory->findAll();
        $data['pager'] = $this->modelAssets->pager;
        $data = [
            'title' => 'Management Assets',
            'data' => $data,
            'keyword' => ''
        ];
        return view('assets/index', $data);
    }

    public function tambah()
    {

        $data = array();
        $data['location'] = $this->modelLocation->findAll();
        $data['brand'] = $this->modelBrand->findAll();
        $data['category'] = $this->modelCategory->findAll();
        $data['condition'] = $this->modelCondition->findAll();
        $data['status'] = $this->modelStatus->findAll();
        $data['type_brand'] = $this->modelTypeBrand->select('*')->join('tbl_brand', 'tbl_type_brand.brand_id = tbl_brand.id_brand')->findAll();;
        $data['main_category'] = $this->modelMainCategory->findAll();


        $randomBytes = random_bytes(10); // Menghasilkan 10 byte acak
        $randomString = bin2hex($randomBytes); // Mengonversi byte menjadi string heksadesimal

        $data['code_assets'] = 'EBS' . date('YmdHis');

        $data['qr_code'] = $this->generate_qr($data['code_assets']);

        $data = [
            'title' => 'Tambah Assets',
            'data' => $data
        ];


        return view('assets/add', $data);
    }

    public function edit($id = null)
    {
        $data = array();
        $data['location'] = $this->modelLocation->findAll();
        $data['brand'] = $this->modelBrand->findAll();
        $data['category'] = $this->modelCategory->findAll();
        $data['condition'] = $this->modelCondition->findAll();
        $data['status'] = $this->modelStatus->findAll();
        $data['type_brand'] = $this->modelTypeBrand->select('*')->join('tbl_brand', 'tbl_type_brand.brand_id = tbl_brand.id_brand')->findAll();;
        $data['main_category'] = $this->modelMainCategory->findAll();
        $data['assets'] = $this->modelAssets->find($id);
        $data = [
            'title' => 'Edit Assets',
            'data' => $data,
        ];
        return view('assets/edit', $data);
    }

    public function hapus($id = null)
    {
        $this->modelAssets->delete($id);
        session()->setFlashdata('message', 'Assets Berhasil Dihapus');
        return redirect()->to('Assets');
    }

    public function save()
    {
        $code_assets = $this->request->getVar('code_assets');
        $qr_code = $this->generate_qr($code_assets);

        $this->modelAssets->save([
            'main_category_id' => $this->request->getVar('main_category_id'),
            'qr_code' => $qr_code,
            'category_id' => $this->request->getVar('category_id'),
            'code_assets' => $this->request->getVar('code_assets'),
            'name_assets' => $this->request->getVar('name_assets'),
            'desc_assets' => $this->request->getVar('desc_assets'),
            'brand_id' => $this->request->getVar('brand_id'),
            'type_brand_id' => $this->request->getVar('type_brand_id'),
            'condition_id' => $this->request->getVar('condition_id'),
            'location_id' => $this->request->getVar('location_id'),
            'status_id' => $this->request->getVar('status_id'),
        ]);


        session()->setFlashdata('message', 'Assets Berhasil Ditambahkan');
        return redirect()->to('Assets');
    }


    public function editParsial()
    {
        $type = $this->request->getVar();
    }

    public function generate_qr($data)
    {
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($data)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create('images/stimik_esq.jpeg')
            ->setResizeToWidth(100)
            ->setPunchoutBackground(true);

        // Create generic label
        $label = Label::create($data)
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);

        $dataUri = $result->getDataUri();

        return $dataUri;
    }

    public function export()
    {
        $data['assets'] = $this->modelAssets->select('*')
            ->join('tbl_brand', 'tbl_brand.id_brand=tbl_assets.brand_id', 'left')
            ->join('tbl_location', 'tbl_location.id_location=tbl_assets.location_id', 'left')
            ->join('tbl_category', 'tbl_category.id_category=tbl_assets.category_id', 'left')
            ->join('tbl_main_category', 'tbl_main_category.id_main_category=tbl_assets.main_category_id', 'left')
            ->join('tbl_status', 'tbl_status.id_status=tbl_assets.status_id', 'left')
            ->join('tbl_condition', 'tbl_condition.id_condition=tbl_assets.condition_id', 'left')
            ->join('tbl_type_brand', 'tbl_type_brand.id_type_brand=tbl_assets.type_brand_id', 'left')
            ->findAll();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Main Kategori')
            ->setCellValue('B1', 'Kode Assets')
            ->setCellValue('C1', 'Nama Assets')
            ->setCellValue('D1', 'Kategori')
            ->setCellValue('E1', 'Merek')
            ->setCellValue('F1', 'Type')
            ->setCellValue('G1', 'Lokasi Asset')
            ->setCellValue('H1', 'Status')
            ->setCellValue('I1', 'Kondisi');


        $column = 2;
        // tulis data mobil ke cell
        foreach ($data['assets'] as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['main_category'])
                ->setCellValue('B' . $column, $data['code_assets'])
                ->setCellValue('C' . $column, $data['name_assets'])
                ->setCellValue('D' . $column, $data['category'])
                ->setCellValue('E' . $column, $data['brand'])
                ->setCellValue('F' . $column, $data['type'])
                ->setCellValue('G' . $column, $data['location'])
                ->setCellValue('H' . $column, $data['status'])
                ->setCellValue('I' . $column, $data['condition']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_Assets_' . date('YmdHis');

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cari()
    {
        if ($this->request->getVar('assets')) {
            $data = array();
            $data['assets'] = $this->modelAssets->select('*')
                ->join('tbl_brand', 'tbl_brand.id_brand=tbl_assets.brand_id', 'left')
                ->join('tbl_location', 'tbl_location.id_location=tbl_assets.location_id', 'left')
                ->join('tbl_category', 'tbl_category.id_category=tbl_assets.category_id', 'left')
                ->join('tbl_main_category', 'tbl_main_category.id_main_category=tbl_assets.main_category_id', 'left')
                ->join('tbl_status', 'tbl_status.id_status=tbl_assets.status_id', 'left')
                ->join('tbl_condition', 'tbl_condition.id_condition=tbl_assets.condition_id', 'left')
                ->join('tbl_type_brand', 'tbl_type_brand.id_type_brand=tbl_assets.type_brand_id', 'left')
                ->like('tbl_assets.name_assets', $this->request->getVar('assets'))
                ->paginate(6, 'tbl_assets');
            $data['pager'] = $this->modelAssets->pager;

            $data = [
                'title' => 'Management Assets',
                'data' => $data,
                'keyword' => $this->request->getVar('assets')

            ];
            return view('assets/index', $data);
        }
    }
}
