<?php include('layouts/header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="zodiac-card">
                <h1 class="zodiac-title">Descubra seu Signo</h1>
                
                <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="text-center">
                    <div class="mb-4 date-input">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" 
                               class="form-control" 
                               id="data_nascimento" 
                               name="data_nascimento" 
                               required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Descobrir meu signo</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>