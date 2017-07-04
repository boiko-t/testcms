/**
 * Created by tayab on 25.06.2017.
 */
function triggerErrorModal(message) {
    $('#error-modal-text').text(message);
    $('#errorModal').modal('show');
}