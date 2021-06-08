let overlayData = {}

loadJS("/assets/overlay/scripts/layout.js")
loadJS("/assets/overlay/scripts/scenes.js")
loadJS("/assets/overlay/scripts/components.js")

// switchScene(createMain)

function getOverlayData() {
    fetch("/api/overlay")
        .then(function (response) {
            return response.json()
        })
        .then(function (data) {
            localData = data

            if(overlayData.last_updated != data.last_updated) {
                console.log("different")
                overlayData = data

                switch(overlayData.scene) {
                    case "Welcome":
                        switchScene("Welcome", [overlayData.elements.welcometitle, overlayData.elements.welcomesubtitle])
                        break
                    case "BRB":
                        switchScene("BRB", [overlayData.elements.brbsubtitle])
                        break
                    case "End":
                        switchScene("End", [overlayData.elements.endsubtitle])
                        break
                    default:
                        switchScene(overlayData.scene);
                }
            }
            console.log(overlayData)
        })
}

setInterval(function() {
    getOverlayData()
}, 5000)

setTimeout(function() {
    getOverlayData()
}, 200)