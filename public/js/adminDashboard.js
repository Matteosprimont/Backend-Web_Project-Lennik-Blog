function changeRights(button, actieType) {
    const userId = button.getAttribute('data-user-id');
    const userName = button.getAttribute('data-user-name');
    let popup, popupText, form;

    if (actieType === 'verwijder') {
        popup = document.getElementById('verwijderPopUp');
        popupText = document.getElementById('popup-tekst');
        popupText.innerHTML = `Weet je zeker dat je deze gebruiker wilt verwijderen?`;
        form = document.getElementById('deleteForm');
        form.setAttribute('action', `/admin/delUser/${userId}`);  
    } 
    else if (actieType === 'promoveer') {
        popup = document.getElementById('promoveerPopUp');
        popupText = document.getElementById('promoveer-popup-tekst');
        popupText.innerHTML = `Weet je zeker dat je ${userName} als admin wilt instellen?`;
        form = document.getElementById('promoteForm');
        form.setAttribute('action', `/admin/makeAdmin/${userId}`);  
    } 
    else if (actieType === 'verwijderAdmin') {
        popup = document.getElementById('verwijderAdminPopUp');
        popupText = document.getElementById('verwijder-admin-popup-tekst');
        popupText.innerHTML = `Weet je zeker dat je de adminrechten van ${userName} wilt verwijderen?`;
        form = document.getElementById('removeAdminForm');
        form.setAttribute('action', `/admin/removeAdmin/${userId}`); 
    }

    popup.classList.remove('hidden');
}
function closePopup(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.add('hidden');
    } else {
        console.error(`Popup met ID ${popupId} niet gevonden.`);
    }
}
