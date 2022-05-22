<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css"
        integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn-toggle {
            padding: .25rem .5rem;
            font-weight: 600;
            color: rgba(0, 0, 0, .65);
            background-color: transparent;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }
    </style>

    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            {{-- Nav Bar --}}
            @include('admin.layouts.nav')


            @yield('section');
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"
        integrity="sha512-Hqe3s+yLpqaBbXM6VA0cnj/T56ii5YjNrMT9v+us11Q81L0wzUG0jEMNECtugqNu2Uq5MSttCg0p4KK0kCPVaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                divisionSelect = $('select[name="division"]');
                districtSelect = $('select[name="district"]');
                upazilaSelect = $('select[name="upazila"]');

                // view district on division select
                divisionSelect.on('change', function() {
                    divisionId = $(this).val();
                    if(divisionId) {
                        $.ajax({
                            type: "GET",
                            url: "/admin/division/getDistrictAjax/" + divisionId,
                            dataType: "json",
                            success:function(data) {
                                districtSelect.empty();
                                $.each(data, function(key, val) {
                                    districtSelect.append('<option value="'+ val.id +'">'+ val.name +'</option>');
                                });
                                districtSelect.removeAttr('disabled')
                            }
                        });
                    }
                });

                // view upazilas on district select
                districtSelect.on('change', function() {
                    districtId = $(this).val();

                    if(districtId) {
                        $.ajax({
                            type: "GET",
                            url: "/admin/district/getUpazilaAjax/" + districtId,
                            dataType: "json",
                            success: function(data) {
                                upazilaSelect.empty();
                                $.each(data, function(key, val) {
                                    upazilaSelect.append('<option value="'+ val.id +'">'+ val.name +'</option>');
                                });
                                upazilaSelect.removeAttr('disabled');
                            }
                        })
                    }
                });

                // Data tables
                $('#locationTable').DataTable();

            });
        </script>

</body>

</html>