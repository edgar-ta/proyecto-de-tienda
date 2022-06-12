/** @type {HTMLVideoElement} **/
const moctezumaVideo = document.querySelector(".moctezuma-video");
const navbar = document.querySelector("nav");

var pending = false;
moctezumaVideo.enteredPictureInPicture = false;

// i don't seem to make this thing work; prevent
// the event to fire once there is already a request
// pending
if (moctezumaVideo.requestPictureInPicture) {
    document.addEventListener("scroll", async () => {
        debugger
        if (pending || moctezumaVideo.enteredPictureInPicture) return;
        console.log("Doing a request for pip");
        let moctezumas = moctezumaVideo.getBoundingClientRect();
        let navbars = navbar.getBoundingClientRect();
        let promise;
        if (moctezumas.y + moctezumas.height / 2 < navbars.height) {
            promise = moctezumaVideo.requestPictureInPicture();
        } else {
            if (document.pictureInPictureElement === moctezumaVideo) {
                promise = document.exitPictureInPicture();
            } else {
                return;
            }
        }
        pending = true;
        moctezumaVideo.enteredPictureInPicture = true;
        const end = () => {
            pending = false;
            moctezumaVideo.enteredPictureInPicture = false;
        }
        promise.then(end).catch(end);
    });
}
