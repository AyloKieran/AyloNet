let chat = null
let chatData = {}
let chatShowing = null

function createChat() {
    panel = document.getElementById("panel")

    chat = document.createElement("div")
    chat.setAttribute("id", "chathidden")

    ctitle = document.createElement("h4")
    ctitle.setAttribute("id", "chattitle")
    ctitle.innerText = "Chat"

    chatbox = document.createElement("div")
    chatbox.setAttribute("id", "chatbox")
    // chatbox.setAttribute("src", "./chat.html")

    chat.appendChild(ctitle)
    chat.appendChild(chatbox)

    panel.appendChild(chat)        

    initChat()
}

function showChat() {
    if(!chatShowing) {
        chat = document.getElementById("chathidden")
        chat.setAttribute("id", "chat")
        chatShowing = true
    }
}

function hideChat() {
    if(chatShowing) {
        chat = document.getElementById("chat")
        chat.setAttribute("id", "chathidden")
        chatShowing = false
    }
}

function initChat() {
    chatShowing = false
    showChat()
}