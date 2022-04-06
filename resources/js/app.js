require('./bootstrap');

let ticketNames = [

    'slidbar.gif',
    'star.gif',
    'ticket2.gif',
    'ticket_info.gif',
    'SHITicketSells.gif',
    'passesandtickets.gif',
    'firenew.gif',
    'dollarspindownd.gif',
    'calnightticket.gif',
    'tickets.gif',
    '2ticketsbear.gif',
    // 'mrticketreadytorockatcojz9.gif'

]

let colorNames = [

    "blueviolet",
    'blue',
    'fuchsia',
    'teal'

]

let titles = [
    'BUY TICKET',
    'BUY NOW',
    'ORDER ONLINE',
    'INCREDIBLE OFFER',
    'DON\'T MISS',
    'THE EVENT OF THE DECADE'
]

window.running = true;
window.popups = [];

window.checkIfRunning = function() {
    return window.running;
}

window.closeAll = function() {
    window.running = false;
    let closingLength = 2000;
    let arrayLength = window.popups.length;
    for (let i = 0; i < window.popups.length; i++) {
        setTimeout(function() {
            window.popups.slice().reverse()[i].close();
        }, closingLength / arrayLength * i);
    }
    setTimeout(function() {
        window.location.href = 'buy';
    }, closingLength + 200)
}

class Popup {

    constructor(_title, _color) {

        this.image = ticketNames[Math.floor(Math.random() * ticketNames.length)];
        this.color = colorNames[Math.floor(Math.random() * colorNames.length)];
        this.title = titles[Math.floor(Math.random() * titles.length)];
        this.width = (Math.random() * 180) + 120;
        this.x = Math.random() * window.innerWidth - this.width;
        this.y = Math.random() * window.innerHeight;
        this.html = this.makeElement();
        this.addToBody();
    }

    makeElement() {
        return `

        <div class="fixed bg-white border cursor-pointer" style="width: ${this.width}px; top: ${this.x}px; left: ${this.y}px;">
            <div class="flex justify-between items-center text-white px-1" style="background-color: ${this.color}">
                <span>
                ${this.title}
                </span>
                <div class="closeButton">
                    <img src="./assets/close.gif" alt="">
                </div>
            </div>
            <img style="width: 100%" src="./assets/${this.image}" alt="" class="gif">
        </div>

        `


    }
    addToBody() {
        let newDiv = document.createElement('div');
        newDiv.innerHTML = this.html;
        let closeButton = newDiv.querySelector('.closeButton');
        let gif = newDiv.querySelector('.gif');
        gif.addEventListener('click', window.closeAll);
        closeButton.addEventListener('click', this.close);
        document.body.appendChild(newDiv);
        this.element = newDiv;
        window.popups.push(this);
    }

    close(event) {
        if (event) {
            event.target.parentElement.parentElement.parentElement.remove();

        } else {
            this.element.remove();
        }
    }

}

setInterval(function () {
    if (window.checkIfRunning()) {
        new Popup('BUY TICKET', 'blue');
    }
}, 400)
