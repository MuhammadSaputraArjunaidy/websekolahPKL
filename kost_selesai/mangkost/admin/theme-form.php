<form action="" method="POST">
    <div class="mb-3">
        <label for="textfield" class="form-label">Textfield :</label>
        <input type="text" class="form-control" name="textfield" id="textfield" placeholder="Textfield" required>
    </div>
    <div class="mb-3">
        <label for="combobox" class="form-label">Combobox :</label>
        <select class="form-select" name="combobox" id="combobox" required>
            <option value="">-- Pilih Combobox --</option>
            <option value="Satu">Satu</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="mb-2">Jenis Kelamin :</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="jk01" value="Laki-Laki" checked>
            <label class="form-check-label" for="jk01">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="jk02" value="Perempuan">
            <label class="form-check-label" for="jk02">Perempuan</label>
        </div>
    </div>
    <div class="mb-3">
        <label class="mb-2">Hobi :</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobi" id="hobi01" value="Makan">
            <label class="form-check-label" for="hobi01">Makan</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobi" id="hobi02" value="Minum">
            <label class="form-check-label" for="hobi02">Minum</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobi" id="hobi03" value="Tidur">
            <label class="form-check-label" for="hobi03">Tidur</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobi" id="hobi04" value="Bernafas">
            <label class="form-check-label" for="hobi04">Bernafas</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobi" id="hobi05" value="Ee">
            <label class="form-check-label" for="hobi05">Ee</label>
        </div>
    </div>
    <div class="mb-3">
        <img src="../dist/images/backgrounds/my-card.jpg" class="img-thumnail" alt="images" height="50">
    </div>
    <div class="mb-3">
        File Lama : <a href="../dist/images/backgrounds/my-card.jpg" target="_blank">man.png <i class="ti ti-link"></i></a>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar :</label>
        <input class="form-control" type="file" name="gambar" id="gambar" required>
        <small class="text-warning">Gambar dengan format JPG, JPEG, PNG dan GIF dengan ukuran maksimal 1 MB</small>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary me-1" name="submit"><i class="ti ti-device-floppy"></i> Simpan</button>
        <a href="theme-table.php" class="btn btn-secondary"><i class="ti ti-arrow-left"></i> Cancel</a>
    </div>
</form>