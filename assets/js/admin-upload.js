
function uploadImage(imageName, image, position, element) {
    const formData = new FormData();

    formData.append('imageName', imageName);
    formData.append('image', image);
    formData.append('position', position);

    fetch(BASE_URL + '/admin/image.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            openPopupNotify('Lưu ảnh thành công', '', 'success');
            element.src = data.imageUrl;
        } else 
            openPopupNotify('Thất bại', data.message, 'error');
    })
    .catch(error => {
        openPopupNotify('Thất bại', '', 'error');
        console.error('Error:', error);
    });
}

window.addEventListener('DOMContentLoaded', () => {
    displayAllImage();
    const uploadImageBoxs = document.querySelectorAll('.img-wrapper');

    uploadImageBoxs.forEach(parent => {
        const imageInput = parent.querySelector('input');
        const imageView = parent.querySelector('img');
        const position = parent.dataset.position;
        const imageName = parent.dataset.name;

        imageInput.addEventListener('change', (event) => {
            const files = event.target.files;

            if (files.length > 0) {
                const file = files[0];
                
                uploadImage(imageName, file, position, imageView);
            } 
        });
    });
});