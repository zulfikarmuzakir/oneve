<div class="col-5 wrapper-subtotal">
    <div class="row d-flex justify-content-end">
        <div class="col-11 detail-pemesanan">
            <h4>Event</h4>
            <div class="nama-event d-flex">
                <div class="banner-container">
                    <img src="{{ $event->banner }}">
                </div>
                <p class="judul-event-pembayaran">{{ $event->event_name }}</p>
            </div>
            <hr>
            <h4>Tiket</h4>
            @foreach ($ticket_qty as $key => $value)
                @if ($value > 0)
                <div class="row detail-tiket d-flex">
                    <div class="col-8">
                      <div class="tiket">
                          <p class="judul-tiket-pembayaran">{{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_name }}</p>
                          <p class="d-flex align-items tanggal-waktu">
                              <i class="material-icons">
                              date_range
                              </i>
                              {{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_date_start }}
                          </p>
                          <p class="d-flex align-items tanggal-waktu">
                              <i class="material-icons">
                              schedule
                              </i>
                              {{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_time_start }} - {{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_time_end }}
                          </p>
                      </div>
                    </div>
                    <div class="col-4  d-flex justify-content-end">
                      <p class="harga">Rp {{ number_format($event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_price, 0, ",", ".") }}</p>
                    </div>
                </div>
                @endif
            @endforeach
              
            <hr class="hr-total">
            <div class="row row-total">
                <div class="col-5 col d-flex align-items-center">
                    <h6>Total Pembayaran</h6>
                </div>
                <div class="col-6 col d-flex justify-content-end">
                    <p class="total-harga">Rp {{ number_format($total_price, 0, ",", ".") }}</p>
                </div>
            </div>
        </div>
    </div>
</div>