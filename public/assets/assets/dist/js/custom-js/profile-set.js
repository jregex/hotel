$('#resetData').click(()=>{
    let image=$('#previewImg');
    document.querySelector('#addForm').reset();
    if(image.attr("src") !== "http://localhost:8000/assets/assets/dist/img/icon/default.webp"){
        image.attr('src','http://localhost:8000/assets/assets/dist/img/icon/default.webp');
    }
});

let fileupload = document.querySelector('#image');
fileupload.onchange=function(){
    uplaodImg(this);
};
function uplaodImg(image){
    let reader = new FileReader();
    let name = image.value;
    name = name.substring(name.lastIndexOf('\\')+1);
    reader.onload = (e)=>{
        $('#previewImg').attr('src',e.target.result);
        // hide(preview);
        $('#previewImg').fadeIn("slow");
    }
    reader.readAsDataURL(image.files[0]);
}
