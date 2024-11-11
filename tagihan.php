<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        h1 {
            color: blue;
            font-weight: bold;
            font-size: 36px;
        }
        input[type=submit] {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
    <form action="contact.php" method="POST">
        <fieldset>
        <h1>Perhitungan Tagihan PDAM</h1>
        <p>
            <label>Nama Pelanggan         :</label>
            <input type="text" name="name"  />
        </p>
        <p>
            <label>Nomor Pelanggan      :</label>
            <input type="text" name="subject"  />
        </p>
        <p>
            <label>Golongan             :</label>
                    
            <input class="form-check-input" type="radio" name="golA" id="A" value="A">
            <label class="form-check-label" for="A">
                        (A)
            </label>

            <input class="form-check-input" type="radio" name="golB" id="B" value="B">
            <label class="form-check-label" for="B">
                        (B)
            </label>

            <input class="form-check-input" type="radio" name="golC" id="C" value="C">
            <label class="form-check-label" for="C">
                        (C)
            </label>

            <input class="form-check-input" type="radio" name="golD" id="D" value="D">
            <label class="form-check-label" for="D">
                        (D)
            </label>

            <input class="form-check-input" type="radio" name="golE" id="E" value="E">
            <label class="form-check-label" for="A">
                        (E)
            </label>
            
        </p>
        <p>
            <input type="submit" name="hitung" value="Hitung" />
        </p>
        </fieldset>
    </form>
</body>
</html>