@extends('layouts.main-admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-4 text-center">
                        <input type="text" class="knob" value="{{ $booking }}" data-width="90" data-height="90"
                            data-fgColor="#f56954">

                        <div class="knob-label">Booking</div>
                    </div>
                    <div class="col-6 col-md-4 text-center">
                        <input type="text" class="knob" value="{{ $jml_tamu }}" data-width="90" data-height="90"
                            data-fgColor="#3c8dbc">

                        <div class="knob-label">Jumlah Tamu</div>
                    </div>
                    <div class="col-6 col-md-4 text-center">
                        <input type="text" class="knob" value="{{ $jml_kamar }}" data-width="90" data-height="90"
                            data-fgColor="#3c8dbc">

                        <div class="knob-label">Kamar tersedia</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.col-md-6 -->
</div>
@endsection

@section('custom-js')
<!-- jQuery Knob -->
<script src="{{ asset('assets/assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<script>
    $(document).ready(function(){
        $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */
    });
</script>
@endsection
