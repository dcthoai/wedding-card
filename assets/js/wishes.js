const submitWishButton = document.getElementById('submit-wish');
const fullnameWish = document.getElementById('fullname-wish');
const emailWish = document.getElementById('email-wish');
const contentWish = document.getElementById('content-wish');
const wishContentBox = document.getElementById('wish-content-list');

const saveWish = async () => {
    try {
        openLoadingAnimation();

        const response = await fetch('http://localhost:8080/card/wishes/save.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                fullname: fullnameWish.value.trim(),
                email: emailWish.value.trim(),
                content: contentWish.value.trim()
            })
        });

        if (!response.ok) {
            closeLoadingAnimation();
            openPopupNotify('Lỗi kết nối', '', 'error');
        } else {
            const result = await response.json();
            closeLoadingAnimation();

            if (result.status === 'success') {
                openPopupNotify('Thành công', '', 'success');
                getWishes();

                fullnameWish.value = '';
                emailWish.value = '';
                contentWish.value = '';
            } else {
                openPopupNotify('Thất bại', '', 'error');
            }
        }
    } catch (error) {
        openPopupNotify('Thất bại', '', 'error');
        console.error("Failed to save your wish. ", error);
    }
}

const getAllWishes = async () => {
    try {
        const response = await fetch('http://localhost:8080/card/wishes/get.php');

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const wishes = await response.json();

        return wishes;
    } catch (error) {
        console.error('Error fetching wishes:', error);
    }
}

const displayWishes = (wishes) => {
    let htmlContent = '';

    wishes.forEach(wish => {
        htmlContent += `
            <div class="wish-item">
                <div class="name">${wish.fullname}</div>
                <div class="content">${wish.content}</div>
            </div>
        `;
    });

    wishContentBox.innerHTML = htmlContent;
}

const getWishes = async () => {
    const wishes = await getAllWishes();

    if (wishes) {
        displayWishes(wishes);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    getWishes();
});

submitWishButton.addEventListener('click', () => {
    saveWish();
})