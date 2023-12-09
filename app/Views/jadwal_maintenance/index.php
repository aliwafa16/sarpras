<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="container">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
</div>

<div class="modal fade" id="jadwalMaintenanceModal" tabindex="-1" aria-labelledby="jadwalMaintenanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="jadwalMaintenanceModalLabel">Tambah Jadwal Maintenance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/JadwalMaintenance/tambah" method="post">
                    <div class="form-group">
                        <label for="type">Assets</label>
                        <select class="form-control selectpicker" name="assets_id" data-live-search="true" required>
                            <option value="Select Part"> --- Pilih assets ---</option>
                            <?php foreach ($assets as $key) : ?>
                                <option value="<?= $key['id_assets'] ?>" data-tokens="<?= $key['id_assets'] ?>"><?= $key['name_assets'] ?> - <?= $key['code_assets'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="form-label">Email address</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="update_assets" checked style="margin-left: 0em;" name="update_assets">
                        <label class="form-check-label" for="update_assets" style="margin-left:1.5em;line-height:2">
                            Update assets
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="set_monthly" checked style="margin-left: 0em;" name="set_monthly">
                        <label class="form-check-label" for="set_monthly" style="margin-left:1.5em;line-height:2">
                            Set setiap bulan
                        </label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="maintenanceInfoModal" tabindex="-1" aria-labelledby="maintenanceInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="maintenanceInfoModalLabel">Info Jadwal Maintenance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodyInfoModal">

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editJadwalModal" tabindex="-1" aria-labelledby="editJadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editJadwalModalLabel">Edit Jadwal Maintenance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="editJadwalBody">

            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function(e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("Tidak boleh kosong !");
                }
            };
            elements[i].oninput = function(e) {
                e.target.setCustomValidity("");
            };
        }
    })
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            // selectable: true,
            themeSystem: 'bootstrap',
            // select: function(info) {
            //     $('#jadwalMaintenanceModal').modal('show');
            // }
            customButtons: {
                myCustomButton: {
                    text: 'Tambah Jadwal Maintenance',
                    click: function() {
                        $('#jadwalMaintenanceModal').modal('show');

                    }
                }
            },
            headerToolbar: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: "JadwalMaintenance/load",
            eventClick: function(info) {
                var eventObj = info.event;

                // let yourDate = new Date()



                $('#maintenanceInfoModal').modal('show')
                $('#bodyInfoModal').html(`
                <table class="table table-borderless">
                    <tr>
                    <td>Nama Assets</td>
                    <td> : ${eventObj.title}</td>
                    </tr>
                    <tr>
                    <td>Tanggal Mulai :</td>
                    <td> : ${moment(eventObj.start).format('DD-MM-YYYY')}</td>
                    </tr>
                    <tr>
                    <td>Tanggal Selesai :</td>
                    <td> : ${moment(eventObj.end).subtract(1, "days").format('DD-MM-YYYY')}</td>
                    </tr>
                </table>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="hapusJadwal(${eventObj.id})">Hapus</button>
            </div>
                `)
            },
            eventDrop: function(info) {
                alert(info.event.title + " was dropped on " + info.event.start.toISOString());

                if (!confirm("Are you sure about this change?")) {
                    info.revert();
                }
            },
            eventResize: function(event) {
                var eventObj = event.event;

                console.log({
                    title: eventObj.title,
                    start: eventObj.start,
                    end: eventObj.end,
                    id: eventObj.id
                });
                $.ajax({
                    url: "JadwalMaintenance/eventResize",
                    type: "POST",
                    data: {
                        title: event.title,
                        start: event.start,
                        end: event.end,
                        id: event.id
                    },
                    success: function() {
                        alert("Event Update");
                    }
                })
            },
        });
        calendar.render();
    });


    function hapusJadwal(id) {
        if (confirm('Yakin ingin menghapus data ?')) {
            $.ajax({
                url: 'JadwalMaintenance/hapus/' + id,
                type: 'GET',
                dataType: 'JSON',
                success: function(results) {
                    if (results.status == 200) {
                        window.location.href = 'JadwalMaintenance'
                    }
                }
            })
        }
    }

    function editJadwal(id) {
        $('#maintenanceInfoModal').modal('hide')
        $('#editJadwalModal').modal('show')


        $.ajax({
            url: 'JadwalMaintenance/getJadwal/' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(results) {
                console.log(results)

                let option = '';
                results.assets.forEach(element => {
                    console.log(element)
                    option += `<option value="${element.id_assets}" data-tokens="${element.id_assets}">${element.name_assets} - </option>`
                    // return `<option value="${element.id_assets}" data-tokens="${element.id_assets}">${element.name_assets} - </option>`
                })
                console.log(option)

                $('#editJadwalBody').html(`<div class="modal-body">
                <form action="/JadwalMaintenance/tambah" method="post">
                    <div class="form-group">
                        <label for="type">Assets</label>
                        <select class="form-control selectpicker" name="assets_id" data-live-search="true" required>
                            <option value="Select Part"> --- Pilih assets ---</option>
                            ${option}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="form-label">Email address</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="update_assets" checked style="margin-left: 0em;" name="update_assets">
                        <label class="form-check-label" for="update_assets" style="margin-left:1.5em;line-height:2">
                            Update assets
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="set_monthly" checked style="margin-left: 0em;" name="set_monthly">
                        <label class="form-check-label" for="set_monthly" style="margin-left:1.5em;line-height:2">
                            Set setiap bulan
                        </label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>`);
            }

        })
    }
</script>

<?= $this->endSection('content') ?>