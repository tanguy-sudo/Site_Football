<?php $this->titre = "Rencontre"; ?>

<div class="row margin-row">
    <form name="importData" class="row g-3" method="POST" action="rencontre/import/" onsubmit="return FileIsCsv(this)">
        <div class="form-row">
            <div class="mb-3">
                <label for="formFileLg" class="form-label">Importer un fichier csv</label>
                <input class="form-control form-control-lg" id="formFileLg CsvFile" type="file" name="CsvFile" accept=".csv">
            </div>
            <div class="mb-3">
			    <button type="submit" name="importer" class="btn btn-primary">Importer</button> 
		    </div>
        </div>
    </form>
</div>
<?php

if(isset($_SESSION['errImport'])){
    echo"              
    <div id='myToast'>
        <div class='d-flex justify-content-center'>    
            <div class='toast-body'>
                erreur import fichier incorrecte
            </div>
        </div>
    </div>
    ";
    echo"<script> toastFunction(); </script>";
    unset($_SESSION['errImport']);
}

?>