const bannerImage = document.getElementById('banner-image');
const eventImages = document.querySelectorAll('img.event-image');
const albumTopImage = document.getElementById('album-top-image');
const albumColImages = document.querySelectorAll('img.album-col-image');
const albumCenterImage = document.getElementById('album-center-image');
const albumUnevenImages = document.querySelectorAll('img.album-uneven-image');
const albumGridImages = document.querySelectorAll('img.album-grid-image');

const fetchImagesByPosition = (position, element) => {
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
        if (data.status === 'success') {
            data.path.forEach((item, index) => {
                if (item && item !== '' && element[index]) 
                    element[index].src = item.replace(/^\.{2}/, ''); // Replace .. in url
                else
                    element.src = item.replace(/^\.{2}/, '');
            });
        }
    })
    .catch(error => {
        console.error(error);
    })
}

const displayAllImage = () => {
    fetchImagesByPosition('banner', bannerImage);
    fetchImagesByPosition('event', eventImages);
    fetchImagesByPosition('album-top', albumTopImage);
    fetchImagesByPosition('album-col', albumColImages);
    fetchImagesByPosition('album-center', albumCenterImage);
    fetchImagesByPosition('album-uneven', albumUnevenImages);
    fetchImagesByPosition('album-grid', albumGridImages);
}


// const getImageByPosition = (position, element) => {
//     fetch(BASE_URL + `/image.php?position=${position}`, {
//         method: 'GET',
//         headers: {
//             'Content-Type': 'application/json',
//             'Cache-Control': 'no-cache',
//             'Pragma': 'no-cache'
//         }
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.status === 'success')
//             element.src = data.path.replace(/^\.{1}/, ''); // Replace .. in url
//         else
//             element.src = '';
//     })
//     .catch(error => {
//         element.src = '';
//         console.error(error);
//     })
// }

window.addEventListener('DOMContentLoaded', () => {
    // const imageLoadByPositions = document.querySelectorAll('img.image-fetch-by-position');

    // imageLoadByPositions.forEach(image => {
    //     const position = image.dataset.position;

    //     getImageByPosition(position, image);
    // })

    displayAllImage();
});