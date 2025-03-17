setTimeout(() => {
    const alertDiv = document.getElementsByName("alert_container");
    if (alertDiv[0] != undefined)
        alertDiv[0].parentNode.removeChild(alertDiv[0]);
}, 3000);

function showJobDetails(iframeRoute) {
    var ifrm = parent.document.querySelector("[name=frame_job_details]");
    ifrm.src = iframeRoute;
}

function showMessageConvo(iframeRoute, messageId) {
    var message_id = parent.document.querySelector("[name=message_id]");
    message_id.value = messageId;
    var ifrm = parent.document.querySelector("[name=frame_message_convo]");
    ifrm.src = iframeRoute;
}

function changeApplicationStatus(status) {
    document.getElementsByName("status").value = status;
    document.submit();
}

function selectFirstMessage() {
    var firstEntry = document.getElementsByClassName("message-list-button")[0];
    firstEntry.click();
    firstEntry.focus();
}
