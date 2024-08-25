const keywordSearchInput = document.getElementById('search-participant');
const keywordSearchButton = document.getElementById('search-participant-button');
const participantBox = document.getElementById('participant-list');
const searchByEventId = document.getElementById('selectUserByEvent');

const displayParticipant = (data) => {
    let htmlContent = '';

    data.forEach(element => {
        const email = element.participant_email === null ? 'Không có email' : element.participant_email;
        htmlContent += `
            <div class="partcipant border-bottom mt-3">
                <h4 class="name">${element.participant}</h4>
                <p class="email mb-0">${email}</p>
                <p class="email mb-2">${element.event_name}</p>
            </div>
        `;
    });

    htmlContent = htmlContent === '' ? 'Không tìm thấy' : htmlContent;
    participantBox.innerHTML = htmlContent;
}

const findParticipant = (keyword) => {
    fetch(BASE_URL + '/admin/participant.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        },
        body: JSON.stringify({
            keyword: keyword
        })
    })
    .then(response => response.json())
    .then(data => {
        displayParticipant(data);
    })
    .catch(error => {
        console.error(error);
    })
}

keywordSearchButton.addEventListener('click', () => {
    const keyword = keywordSearchInput.value.trim();
    findParticipant(keyword);
});

window.addEventListener('DOMContentLoaded', () => {
    findParticipant('');
});

searchByEventId.addEventListener('change', () => {
    const eventId = searchByEventId.value;

    fetch(BASE_URL + `/admin/participant.php?event=${eventId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(response => response.json())
    .then(data => {
        displayParticipant(data);
    })
    .catch(error => {
        console.error(error);
    })
});