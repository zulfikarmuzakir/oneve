import $ from './utils/QuerySelectorHelper.js';
import Ticket from './components/Ticket.js';


// DATA
const data = {
  event: {
    name      : '',
    category  : '',
    startDate : '',
    endDate   : '',
    startTime : '',
    endTime   : ''
  },

  tickets: [],
};


// GET INPUT ELEMENTS
const inputElmnts = {
  createEvent() {
    return new Map([
      ['name',      $.first('#event-name')],
      ['category',  $.first('#event-category')],
      ['startDate', $.first('#event-startDate')],
      ['endDate',   $.first('#event-endDate')],
      ['startTime', $.first('#event-startTime')],
      ['endTime',   $.first('#event-endTime')]
    ]);
  },

  createTicket() {
    return new Map([
      ['eventName', $.first('#ticket-eventName')],
      ['stocks',    $.first('#ticket-stocks')],
      ['startDate', $.first('#ticket-startDate')],
      ['endDate',   $.first('#ticket-endDate')],
      ['startTime', $.first('#ticket-startTime')],
      ['endTime',   $.first('#ticket-endTime')],
      ['price',     $.first('#ticket-price')]
    ]);
  }
};


// GET PREVIEW ELEMENTS
const previewElmnts = {
  createEvent() {
    return new Map([
      ['name',      $.first('#eventPreview-name')],
      ['category',  $.first('#eventPreview-category')],
      ['startDate', $.first('#eventPreview-startDate')],
      ['endDate',   $.first('#eventPreview-endDate')],
      ['startTime', $.first('#eventPreview-startTime')],
      ['endTime',   $.first('#eventPreview-endTime')]
    ]);
  },

  createTicket() {
    return new Map([
      ['ticketList', $.first('#ticket-list')]
    ]);
  }
};



// GET BUTTON ELEMENTS
const buttonElmnts = {
  createEvent() {
    return new Map([
      ['submit', $.first('#event-submit')]
    ]);
  },

  createTicket() {
    return new Map([
      ['submit', $.first('#ticket-submit')]
    ])
  }
}


// GET INPUT VALUES
const inputValues = {
  _proccess(elmnts) {
    const result = {};
    const inputs = inputElmnts[elmnts]();
    inputs.forEach((item, key) => result[key] = item.value);

    return result;
  },

  createEvent() {
    return this._proccess('createEvent');
  },

  createTicket() {
    return this._proccess('createTicket');
  }
};


// SETUP CREATE EVENT
const createEventInputs   = inputElmnts.createEvent();
const createEventPreviews = previewElmnts.createEvent();

createEventInputs.forEach((item, key) => {
  item.addEventListener('blur', (e) => {
    setTimeout(() => {
      const value = e.target.value;
      data.event[key] = value;
      createEventPreviews.get(key).innerText = value;
    }, 300)
  });
});


// SETUP CREATE TICKET
const createTickeInputs   = inputElmnts.createTicket();
const createTicketButtons = buttonElmnts.createTicket();
const ticketsList         = previewElmnts.createTicket().get('ticketList');

createTicketButtons.get('submit')
.addEventListener('click', () => {
  const item = inputValues.createTicket();
  data.tickets.unshift(item);
  ticketsList.insertAdjacentElement('afterbegin', Ticket(item));
  console.log(data);
})