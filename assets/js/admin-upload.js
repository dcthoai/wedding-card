
const getImageByPosition = (position, element) => {
    fetch(BASE_URL + `/image.php?position=${position}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success')
            element.src = data.path;
        else
            element.src = '';
    })
    .catch(error => {
        element.src = '';
        console.error(error);
    })
}

function uploadImage(image, position, element) {
    const formData = new FormData();

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
    const uploadImageBoxs = document.querySelectorAll('.img-wrapper');

    uploadImageBoxs.forEach(parent => {
        const imageInput = parent.querySelector('input');
        const imageView = parent.querySelector('img');
        const position = parent.dataset.position;

        getImageByPosition(position, imageView);

        imageInput.addEventListener('change', (event) => {
            const files = event.target.files;

            if (files.length > 0) {
                const file = files[0];
                
                uploadImage(file, position, imageView);
            } 
        })
    });
})