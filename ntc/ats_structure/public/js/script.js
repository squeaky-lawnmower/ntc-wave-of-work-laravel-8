setTimeout(() => {
    const alertDiv = document.getElementsByName("alert_container");
    if (alertDiv[0] != undefined)
        alertDiv[0].parentNode.removeChild(alertDiv[0]);
}, 3000);

function showJobDetails(iframeRoute) {
    console.log(iframeRoute);

    var ifrm = parent.document.querySelector("[name=frame_job_details]");
    ifrm.src = iframeRoute;
}
