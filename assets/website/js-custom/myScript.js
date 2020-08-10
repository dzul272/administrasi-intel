var myObj = 
{
    init:function(){
        this.load_provinsi();
    },
    load_provinsi:function(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET','http://dev.farizdotid.com/api/daerahindonesia/provinsi',true);
        xhr.onload = function()
        {
            var provinsi = JSON.parse(xhr.responseText);
            alert(xhr.responseText);
            provinsi.forEach(function(value)
            {
                var op = document.createElement('option');
                op.innerText = value.nama;
                op.setAttribute('value',value.id);
                document.getElementById('provinsi').appendChild(op);
            });
        }
        xhr.send();
    }
}
myObj.init();