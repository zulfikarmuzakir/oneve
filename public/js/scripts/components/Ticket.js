import HTMLHelper from '../utils/HTMLHelper.js';
const { toElement } = HTMLHelper;

// TICKET COMPONENTS
const Ticket = ({
  eventName = ' ', 
  startDate = ' ',
  endDate   = ' ',
  startTime = ' ',
  endTime   = ' ',
  price     = 0,
  stocks    = 0,
  link      = ' '
} = {}) => (
  toElement(`
    <div class="tiket"> 
      <div class="row row-keterangan-tiket">
        ${FirstSection({eventName, startDate, endDate, startTime, endTime, link})}
        ${SecondSection({price, stocks})}
      </div>
    </div>
  `)
);


// FIRST SECTION
const FirstSection = ({eventName, startDate, endDate, startTime, endTime, link}) => (`
  <div class="col-6">
    <div class="row">
      <div class="col-12 judul-tiket">
      <input id="inputTicketNameRepeat" value="${eventName}" type="text" class="form-hidden-name" disabled>
      <input id="inputTicketNameRepeat" value="${eventName}" name="ticket_name[]" type="hidden" class="form-hidden-name">
      </div>
      <div class="col-12 ticket-ends">
        <div class="row">
          <div class="col-7 end-container d-flex justify-content-start">
            <p>Berakhir pada   
              <input id="inputStartDateRepeat" value="${startDate}" name="ticket_date_start[]" type="hidden" class="form-hidden-tanggal" readonly> 
              <input id="inputEndDateRepeat" value="${endDate}" name="ticket_date_end[]" type="text" class="form-hidden-tanggal" readonly>
            </p>
          </div>
          <div class="col-5">
            <p>  
            <input id="inputStartTimeRepeat" value="${startTime}" name="ticket_time_start[]" type="text" class="form-hidden-waktu" readonly> - 
            <input id="inputEndTimeRepeat" value="${endTime}" name="ticket_time_end[]" type="text" class="form-hidden-waktu" readonly>
            WIB</p>
          </div>
        </div>
      </div>
    </div>
    <input id="inputLinkRepeat" value="${link}" name="link[]" type="hidden" class="form-hidden" readonly>
  </div>
`);


// SECOND SECTION
const SecondSection = ({price, stocks}) => (`
  <div class="col-6 d-flex align-items-center">
    <div class="col-6 harga-tiket d-flex justify-content-end align-items-end">
      Rp ${price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') || 0}
      <input id="priceRepeat" value="${price || 0}" name="ticket_price[]" type="hidden" class="form-hidden-stock">
      <input id="priceRepeat" value="${stocks}" name="ticket_stock[]" type="hidden" class="form-hidden-stock">
    </div>
    <div class="col-6 action d-flex justify-content-end">
    <a class="btn btn-primary d-flex justify-content-center button-action edit-ticket"  data-toggle="modal" data-target="#edit-detail-tiket">
      <i class="material-icons edit">
      edit
      </i>
    </a> 
      <button class="button-action delete-ticket" type="button">
        <i class="material-icons edit">
          delete
        </i>
      </button>
    </div>
  </div>
`);


export default Ticket;