const fullNameInput = document.getElementById('fullname-attend');
const emailInput = document.getElementById('email-attend');
const groomEngagementCeremony = document.getElementById('groom-engagement');
const brideEngagementCeremony = document.getElementById('bride-engagement');
const groomWedding = document.getElementById('groom-wedding');
const brideWedding = document.getElementById('bride-wedding');
const confirmAttendEvent = document.getElementById('submit-attend');

const getEvent = () => {
    let eventId = [];

    if (groomEngagementCeremony.checked)
        eventId.push(1);

    if (brideEngagementCeremony.checked)
        eventId.push(2);

    if (groomWedding.checked)
        eventId.push(3);

    if (groomWedding.checked)
        eventId.push(4);

    return eventId;
}

const saveAttendUser = async () => {
    try {
        const data = {
            fullname: fullNameInput.value.trim(),
            email: emailInput.value.trim(),
            eventIds: getEvent()
        }

        openLoadingAnimation();

        const response = await fetch('http://localhost:8080/card/attend/save.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            closeLoadingAnimation();
            openPopupNotify('Lỗi kết nối', '', 'error');
        } else {
            const result = await response.json();
            closeLoadingAnimation();

            if (result.status === 'success') {
                fullNameInput.value = '';
                emailInput.value = '';
                groomEngagementCeremony.checked = false;
                brideEngagementCeremony.checked = false;
                groomWedding.checked = false;
                brideWedding.checked = false;

                openPopupNotify('Thành công', '', 'success');
            } else {
                openPopupNotify('Thất bại', '', 'error');
            }
        }
    } catch (error) {
        openPopupNotify('Thất bại', '', 'error');
        console.error(error);
    }
}

confirmAttendEvent.addEventListener('click', () => {
    saveAttendUser();
})