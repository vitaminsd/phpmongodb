function saveFile() {
    var loginfo = document.getElementById("loginfo").value;
    var logname = "run.log";
    
    var aLink = document.createElement('a');
    var evt = document.createEvent("HTMLEvents");
    evt.initEvent("click", false, false);
    
    aLink.download = logname;
    aLink.href = URL.createObjectURL(new Blob([loginfo]));
    aLink.dispatchEvent(evt);
}

function editResult() {
    $('.edit-result').toggle();
}

function checkall() {
    var flag = document.getElementById("check-all").checked;
    $('.check-remove').each(function() { //loop through each checkbox
            this.checked = flag;  //select all checkboxes with class "checkbox-remove"              
    });
}