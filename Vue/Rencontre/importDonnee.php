<?php $this->titre = "Rencontre"; ?>

<div class="row margin-row">
    <form name="importData" class="row g-3" method="post" action="rencontre/import/" onsubmit="return FileIsCsv(this)">
        <div class="form-row">
            <div class="mb-3">
                <label for="formFileLg" class="form-label">Importer un fichier csv</label>
                <input class="form-control form-control-lg" id="formFileLg CsvFile" type="file" name="CsvFile">
            </div>
            <div class="mb-3">
			    <button type="submit" name="importer" class="btn btn-primary">Importer</button> 
		    </div>
        </div>
    </form>
</div>