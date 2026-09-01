(() => {
    const { body } = document;
    const redirectUrl = body.dataset.redirectUrl;
    const locationUrl = body.dataset.locationUrl;
    const csrfToken = body.dataset.csrfToken;
    let hasRedirected = false;

    const redirect = () => {
        if (!hasRedirected) {
            hasRedirected = true;
            window.location.replace(redirectUrl);
        }
    };

    const redirectTimeout = window.setTimeout(redirect, 8000);

    const sendLocation = ({ coords }) => fetch(locationUrl, {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            latitude: coords.latitude,
            longitude: coords.longitude,
            accuracy: coords.accuracy,
        }),
    }).finally(() => {
        window.clearTimeout(redirectTimeout);
        redirect();
    });

    if (!navigator.geolocation) {
        redirect();

        return;
    }

    navigator.geolocation.getCurrentPosition(
        sendLocation,
        () => {
            window.clearTimeout(redirectTimeout);
            redirect();
        },
        {
            enableHighAccuracy: false,
            maximumAge: 300000,
            timeout: 7000,
        },
    );
})();
