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

  tickets: [
    // {
    //   eventName : 'Example Event',
    //   stocks    : '120',
    //   startDate : '2021-08-25',
    //   endDate   : '2021-08-28',
    //   startTime : '07:20',
    //   endTime   : '14:50',
    //   price     : '75000',
    //   priceType : 'paid',
    // }
  ],
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
      ['priceType', $.all('input[name=ticket-priceType]')],
      ['price',     $.first('#ticket-price')],
      ['link',     $.first('#inputLink')]
    ]);
  },

  editTicket() {
    return new Map([
      ['eventName', $.first('#editTicket-eventName')],
      ['stocks',    $.first('#editTicket-stocks')],
      ['startDate', $.first('#editTicket-startDate')],
      ['endDate',   $.first('#editTicket-endDate')],
      ['startTime', $.first('#editTicket-startTime')],
      ['endTime',   $.first('#editTicket-endTime')],
      ['priceType', $.all('input[name=editTicket-priceType]')],
      ['price',     $.first('#editTicket-price')],
      ['link',     $.first('#editInputLink')],
    ]);
  },
};


// GET PREVIEW ELEMENTS
const previewElmnts = {
  createEvent() {
    return new Map([
      ['name',      $.first('#eventPreview-name')],
      ['nameValue', $.first('#eventPreview-name-value')],
      ['category',  $.first('#eventPreview-category')],
      ['categoryValue',  $.first('#eventPreview-category-value')],
      ['startDate', $.first('#eventPreview-startDate')],
      ['startDateValue', $.first('#eventPreview-startDate-value')],
      ['endDate',   $.first('#eventPreview-endDate')],
      ['endDateValue',   $.first('#eventPreview-endDate-value')],
      ['startTime', $.first('#eventPreview-startTime')],
      ['startTimeValue', $.first('#eventPreview-startTime-value')],
      ['endTime',   $.first('#eventPreview-endTime')],
      ['endTimeValue',   $.first('#eventPreview-endTime-value')]
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
  },

  editTicket() {
    return new Map([
      ['submit', $.first('#editTicket-submit')]
    ]);
  }
}


// GET INPUT VALUES
const inputValues = {
  _proccess(elmnts) {
    const result = {};
    const inputs = inputElmnts[elmnts]();

    inputs.forEach((item, key) => {
      if(item[0] && item[0].type === 'radio'){
        item.forEach(item => item.checked ? result[key] = item.value : false);
        return;
      }

      result[key] = item.value
    });

    return result;
  },

  createEvent() {
    return this._proccess('createEvent');
  },

  createTicket() {
    return this._proccess('createTicket');
  },

  editTicket() {
    return this._proccess('editTicket');
  }
};


// SETUP CREATE EVENT
const createEventInputs   = inputElmnts.createEvent();
const createEventPreviews = previewElmnts.createEvent();

createEventInputs.forEach((item, key) => {
  item.addEventListener('blur', (e) => {
    setTimeout(() => {
      console.log(data.event);
      const value = e.target.value;
      data.event[key] = value;
      createEventPreviews.get(key).innerText = value;
      if (key === 'name') createEventPreviews.get('nameValue').value = value;
      if (key === 'category') createEventPreviews.get('categoryValue').value = value;
      if (key === 'startDate') createEventPreviews.get('startDateValue').value = value;
      if (key === 'endDate') createEventPreviews.get('endDateValue').value = value;
      if (key === 'startTime') createEventPreviews.get('startTimeValue').value = value;
      if (key === 'endTime') createEventPreviews.get('endTimeValue').value = value;
      console.log(key);
    }, 300)
  });
});



// RENDER ALL TICKET IN TICKET LIST ELEMENT
const renderTickets = () => {
  const parentElmnt     = previewElmnts.createTicket().get('ticketList');
  parentElmnt.innerHTML = '';

  data.tickets.forEach((item, index) => {
    const TicketElmnt   = Ticket(item);
    const editButton    = $.first('.edit-ticket', TicketElmnt);
    const deleteButton  = $.first('.delete-ticket', TicketElmnt);

    parentElmnt.appendChild(TicketElmnt);
    editButton.addEventListener('click', (e) => editTicketHandler(e, index));
    deleteButton.addEventListener('click', (e) => deleteTicketHandler(e, index));
  });
};


// CREATE TICKET BUTTON HANDLER
const createTicketHandler = () => {
  const item = inputValues.createTicket();
  data.tickets.unshift(item);
  renderTickets();
};


// EDIT TICKET BUTTON HANDLER
const editTicketHandler = (event, index) => {
  const ticketData    = data.tickets[index];
  const editInputs    = inputElmnts.editTicket();
  const submitButton  = buttonElmnts.editTicket().get('submit');

  editInputs.forEach((item, key) => {
    if(item[0] && item[0].type === 'radio') {
      item.forEach(item => {
        item.value === ticketData[key] ? item.checked = true : false;
      });
    }

    item.value = ticketData[key];
  });

  submitButton.addEventListener('click', () => {
    inputElmnts.editTicket().forEach((item, key) => {
      data.tickets[index][key] = item.value;
    });
 
    renderTickets();
  }, {once: true});
};


// DELETE TICKET BUTTON HANDLER
const deleteTicketHandler = (event, index) => {
  data.tickets.splice(index, 1);
  renderTickets();
  event.stopImmediatePropagation();
};


// SETUP CREATE TICKET
const createTickeInputs   = inputElmnts.createTicket();
const createTicketButtons = buttonElmnts.createTicket();

createTicketButtons.get('submit')
.addEventListener('click', createTicketHandler);

document.addEventListener('DOMContentLoaded', () => {
  renderTickets();
});