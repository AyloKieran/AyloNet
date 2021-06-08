let nowPlaying = null
let nowPlayingData = {}
let nowPlayingShowing = null

function createNowPlaying() {
    if (overlayData.components.nowplaying.shown == "true") {
        panel = document.getElementById("panel")

        np = document.createElement("div")
        np.setAttribute("id", "nowplayinghidden")

        npta = document.createElement("table")
        npta.setAttribute("id", "nowplayingtable")

        tr1 = document.createElement("tr")

        td1 = document.createElement("td")
        td1.setAttribute("rowspan", "2")
        td1.setAttribute("id", "nowplayingimage")
        npi = document.createElement("img")
        npi.setAttribute("id", "nowplayingimg")
        td1.appendChild(npi)

        td2 = document.createElement("td")
        npt = document.createElement("h5")
        npt.setAttribute("id", "nowplayingtitle")
        npt.innerText = "Loading"
        td2.appendChild(npt)

        tr1.appendChild(td1)
        tr1.appendChild(td2)

        tr2 = document.createElement("tr")

        td3 = document.createElement("td")
        npa = document.createElement("h5")
        npa.setAttribute("id", "nowplayingartist")
        npa.innerText = "Loading"
        td3.appendChild(npa)

        tr2.appendChild(td3)

        npta.appendChild(tr1)
        npta.appendChild(tr2)


        np.appendChild(npta)

        panel.appendChild(np)

        initNowPlaying()
    }
}

function showNowPlaying() {
    if(!nowPlayingShowing) {
        nowplaying = document.getElementById("nowplayinghidden")
        nowplaying.setAttribute("id", "nowplaying")
        nowPlayingShowing = true
    }
}

function hideNowPlaying() {
    if(nowPlayingShowing) {
        nowplaying = document.getElementById("nowplaying")
        nowplaying.setAttribute("id", "nowplayinghidden")
        nowPlayingShowing = false
    }
}

function updateNowPlaying(title = "Title", artist = "Artist", img = "") {
    document.getElementById("nowplayingartist").innerText = artist;
    document.getElementById("nowplayingtitle").innerText = title;
    document.getElementById("nowplayingimg").setAttribute("src", img)
}
function getNowPlaying() {
    if (nowPlaying) {
        fetch("/api/nowplaying")
            .then(function (response) {
                return response.json()
            })
            .then(function (data) {
                nowPlayingData = data
            })
            .then(function () {
                if(nowPlayingData.hasOwnProperty('artist')) {
                    updateNowPlaying(nowPlayingData.trackName, nowPlayingData.artist, nowPlayingData.artwork)
                    showNowPlaying()
                }
            })
    }

    if(nowPlayingData.hasOwnProperty('artist')) {
        if(!nowPlayingShowing) {
            showNowPlaying()
        }
    } else {
        if (nowPlayingShowing) {
            hideNowPlaying()
        }
    }  
}

function initNowPlaying() {
    nowPlaying = setInterval(function() {
        getNowPlaying()
    }, 5000)
    nowPlayingShowing = false
    getNowPlaying()
}