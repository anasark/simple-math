<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html, body {background: #ffffff;color: #404040;}
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance:textfield;}
        .input-group {margin-bottom: 0px!important;}
        #hasil p {font-size: 5rem}
    </style>
<body>
<div class="mx-auto" style="max-width: 450px">
    <form>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="a1">
            <div class="input-group-append input-cari-persen">
                <span class="input-group-text">Harga</span>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="a2">
            <div class="input-group-append input-persen">
                <span class="input-group-text">%</span>
            </div>
            <div class="input-group-append input-cari-persen">
                <span class="input-group-text">> Harga</span>
            </div>
        </div>
        <select class="form-control" name="a">
            <option value="tambah">Tambah</option>
            <option value="kurang">Pengurangan</option>
            <option value="kali">Perkalian</option>
            <option value="bagi">Pembagian</option>
            <option value="persen">Persentase</option>
            <option value="diskon">Potongan Persentase (Diskon)</option>
            <option value="untung">Keuntungan Persentase</option>
            <option value="caripersen">Cari Persentase</option>
        </select>
    </form>

    <div id="hasil" class="text-center">
        <p></p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script>
    $('.input-group-append').hide();

    $('[name=a1], [name=a2], [name=a]').on('change keyup paste', function (e) {
        e.preventDefault();

        switch ($('[name=a').val()) {
            case 'persen':
            case 'diskon':
            case 'untung':
                $('.input-cari-persen').hide();
                $('.input-persen').show();
                break;
            case 'caripersen':
                $('.input-persen').hide();
                $('.input-cari-persen').show();
                break;
            default:
                $('.input-group-append').hide();
                break;
        }

        if ($('[name=a1]').val() != '' && $('[name=a2]').val() != '') {
            $.ajax({
                url: "/math_process.php",
                type: "post",
                data: $('form').serialize() ,
                dataType: 'json',
                success: function (data) {
                    $('#hasil').find('p').text(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    })
</script>
</body>
</html>
