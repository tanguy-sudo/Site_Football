$(document).ready(function(){
        $("#myToast").toast('show');
});


$(document).ready(function(){
        switch($_GET_PATH()){
                case 'convocation':
                        $('#navConv').addClass('active');
                        $('#dropdownConvocation').addClass('active');          
                        break;
                case 'rencontre':
                        $('#navRenc').addClass('active');
                        $('#dropdownRencontre').addClass('active');      
                        break;
                case 'absence':
                        $('#navAbs').addClass('active');
                        $('#dropdownAbsence').addClass('active');            
                        break;
                case 'connexion':
                        $('#navCon').addClass('active');
                        break;
                case 'effectif':
                        $('#navEff').addClass('active');
                        $('#dropdownEffectif').addClass('active');
                        break;
        }
      })
      
function $_GET_PATH() {
        var path = window.location.href.split("/");
        return path[4] ? path[4] : null;
}

function deleteRencontre(){        
        if (confirm('Souhaitez-vous réellement supprimer cette rencontre, cela peut entraîner la suppression d\'une convocation ?')) {
                // oui
                return true;
                
        } else {
                // non
                return false;
        }
}

function FileIsCsv(frm){
        var ok=1;
        if (frm.elements['CsvFile'].value =="") {
                ok=0;
                alert('Vous devez fournir un fichier .csv');
                return false;
        }
        else if (frm.elements['CsvFile'].value.substr(-4)!=".csv") {
                ok=0;
                alert('Le fichier doit être fourni en format .csv');
                return false;
        }

        //si tout est ok
        if (ok==1){
                return true;
        }
        else {
                return false;
        }
}
