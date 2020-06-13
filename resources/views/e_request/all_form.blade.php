<section class="content">
<div class="container-fluid" >
  <div class='col-lg-12' style="margin-top: 2%">
    <div class="row" >
        <p class="col-lg-3 chooseForm"><img src="storage/img/hand.png" alt="" width="40px" height="40px"> ជ្រើសរើសសំណើ :</p>
        <select name="" class="form-control col-lg-4 select2" onchange="ShowForm(this.value,0)">
            <option value="-1" disabled hidden selected></option>
            @foreach($r as $row)
                <option value="{{ $row["id"] }},{{ $row["link"] }}">{{ $row["name_kh"] }}</option>';
            @endforeach
        </select>
    </div>
</div>
</section>
<script>
    $(".select2").select2();
</script>