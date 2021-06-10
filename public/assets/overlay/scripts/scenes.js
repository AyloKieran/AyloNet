function createWelcome(ttitle = "Welcome", tsubtitle = "I'll be streaming soon! 👋") {
    addBackground()
    addPanel("right")

    panel = document.getElementById("panel")

    welcometext = document.createElement("div")
    welcometext.setAttribute("id", "welcometext")

    welcometitle = document.createElement("h1")
    welcometitle.setAttribute("id", "welcometitle")
    welcometitle.innerText = ttitle

    welcometext.appendChild(welcometitle)

    if (tsubtitle != "") {
        welcomesubtitle = document.createElement("h4")
        welcomesubtitle.setAttribute("id", "welcomesubtitle")
        welcomesubtitle.innerText = tsubtitle
        
        welcometext.appendChild(welcomesubtitle)
    }   

    panel.appendChild(welcometext)

    createSchedule()
    createNowPlaying()

    container = document.getElementById("container")

    image = document.createElement("img")
    image.setAttribute("src", "./assets/overlay/SS.png")
    image.setAttribute("id", "scenetextimage")

    container.appendChild(image)
}

function createEnd(tsubtitle = "See you soon! 👋") {
    addBackground()
    addPanel("right")

    panel = document.getElementById("panel")

    endtext = document.createElement("div")
    endtext.setAttribute("id", "endtext")

    if (tsubtitle != "") {
        endsubtitle = document.createElement("h4")
        endsubtitle.setAttribute("id", "endsubtitle")
        endsubtitle.innerText = tsubtitle

        endtext.appendChild(endsubtitle)
    }   

    panel.appendChild(endtext)

    createChat()
    createNowPlaying()

    container = document.getElementById("container")

    image = document.createElement("img")
    image.setAttribute("src", "./assets/overlay/SE.png")
    image.setAttribute("id", "scenetextimage")

    container.appendChild(image)
}

function createBRB(tsubtitle = "Be back soon!") {
    addBackground()
    addPanel("right")

    panel = document.getElementById("panel")

    endtext = document.createElement("div")
    endtext.setAttribute("id", "endtext")


    endsubtitle = document.createElement("h4")
    endsubtitle.setAttribute("id", "endsubtitle")
    endsubtitle.innerText = tsubtitle

    endtext.appendChild(endsubtitle)

    panel.appendChild(endtext)

    createChat()
    createSchedule()
    createNowPlaying()

    container = document.getElementById("container")

    image = document.createElement("img")
    image.setAttribute("src", "./assets/overlay/BRB.png")
    image.setAttribute("id", "scenetextimage")

    container.appendChild(image)
}

function createMain() {
    addPanel("leftshort")

    createTime()
    createSchedule()
    createChat()
    createNowPlaying()
}

function createChatting() {
    addBackground()
    addPanel("left")
    addCameraHolder()

    createChat()
    createSchedule()
    createNowPlaying()
}