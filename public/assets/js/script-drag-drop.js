
document.addEventListener("DOMContentLoaded", function() {
  const dragArea = document.querySelector('#drop-area');
  const dragText = document.querySelector('.head-drag');
  let input = document.querySelector('#fileInput');
  let file;
  
  dragArea.onclick = () => {
      input.click();
  };
  
  input.addEventListener('change', function() {
      file = this.files[0];
      dragArea.classList.add('active');
      displayFile();
  });

  dragArea.addEventListener('dragover', (event) =>{
      event.preventDefault();
      dragText.textContent = 'Release to upload';
      dragArea.classList.add('active');
  });

  dragArea.addEventListener('dragleave', () =>{
      dragText.textContent = 'Drag & Drop';
      dragArea.classList.remove('active');
  });

  dragArea.addEventListener('drop', (event)=>{
      event.preventDefault();
      file = event.dataTransfer.files[0];
      displayFile(); 
  });

  function displayFile() {
      let fileType = file.type;
      let validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];

      if(validExtensions.includes(fileType)){
          let fileReader = new FileReader();

          fileReader.onload = () =>{
              let fileURL = fileReader.result;
              input.value = fileURL;
              let imgTag = `<img src = "${fileURL}" alt ="">`;
              dragArea.innerHTML = imgTag;
          };
          fileReader.readAsDataURL(file);
      } else {
          alert('This file is not an Image');
          dragArea.classList.remove('active');
      }
  }
});