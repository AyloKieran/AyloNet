function addPanel(direction = "right") {
    container = document.getElementById("container");
    video = document.createElement("video");
    video.setAttribute("id", "Panel")
    if (direction == "left") {
        video.setAttribute("class", "panelleftvid")
    }
    if (direction == "leftshort") {
        video.setAttribute("class", "panelleftshortvid")
    }
    video.autoplay = true;
    video.loop = true;
    video.muted = true;
    source = document.createElement("source");
    source.setAttribute("src", "./assets/overlay/Panel.webm")

    video.appendChild(source)
    container.appendChild(video)

    panel = document.createElement("div")
    panel.setAttribute("id", "panel");
    panel.setAttribute("class", "panel" + direction)
    container.appendChild(panel)
}

function addBackground() {
    container = document.getElementById("container");
    video = document.createElement("video");
    video.setAttribute("id", "background")
    video.autoplay = true;
    video.loop = true;
    video.muted = true;
    source = document.createElement("source");
    source.setAttribute("src", "./assets/overlay/Background.mp4")

    video.appendChild(source)
    container.appendChild(video)
}

function addCameraHolder(direction = "right") {
    container = document.getElementById("container");

    camera = document.createElement("div")
    camera.setAttribute("id", "camera")
    container.appendChild(camera)

    camHolder = document.createElement("video")
    camHolder.setAttribute("id", "camHolder")
    camHolder.autoplay = true;
    camHolder.loop = true;
    camHolder.muted = true;

    source = document.createElement("source");
    source.setAttribute("src", "./assets/overlay/WF.webm")

    camHolder.appendChild(source)
    container.appendChild(camHolder)
}

function switchScene(scene, args) {
    startTransition()
    setTimeout(function () {
        clearOverlay()
        scene = eval("create" + scene)
        scene.apply(this, args)
    }, 450)
}

function clearOverlay() {
    clearInterval(timerupdater)

    if (nowPlaying) {
        clearInterval(nowPlaying)
        nowPlaying = null
    }

    if (schedule) {
        clearInterval(schedule)
        schedule = null

        clearInterval(eventsProgress)
        eventsProgress = null
    }

    container = document.getElementById("container")
    container.innerHTML = "";
}

function startTransition() {
    video = document.getElementById("transition").play()
}