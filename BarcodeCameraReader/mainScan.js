


let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
Instascan.Camera.getCameras().then(function(cameras) {
   if(cameras.length > 1 ) {
   
       scanner.start(cameras[1]);
   
   }else if(cameras.length > 0 ) {

       scanner.start(cameras[0]);
   } else{
       alert('No cameras found');
   }

}).catch(function(e) {
   console.error(e);
});

scanner.addListener('scan',function(c){
  readFile(c);
});


async function readFile(c) {


  myArray = c.split(",");
  if(myArray.length == 0) {

    Swal.fire({
       title: 'No Character!',
       text: "Please scanned another "+myArray.length+ " ",
       type: 'warning',
       confirmButtonText: 'OK'
     });

    return;
  }

    document.getElementById("search").value = c;
  
    var myArray = c.split(",");
     location.href = 'admin_index.php?page=client_verifier&ref='+myArray[0];   
}


