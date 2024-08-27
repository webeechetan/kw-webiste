@extends('admin.layouts.app')
@section('title', 'Our Clients')
@section('content')
<div class="row">
   <div class="col-md-6">
      {{-- <div class="card p-3 text-end"> --}}
         {{-- <figure class="mb-0">
           <blockquote class="blockquote ">
             <p class="quote_content"></p>
           </blockquote>
           <figcaption class="blockquote-footer mb-0 text-muted quote_author">
           </figcaption>
         </figure> --}}
         {{-- <div class="demo-inline-spacing quote_tags"></div> --}}
         {{-- <div class="text-center mt-2 quote_spinner">
            <div class="spinner-border spinner-border-lg text-primary " role="status">
               <span class="visually-hidden">Loading...</span>
             </div>
         </div> --}}
       {{-- </div> --}}
    </div>
   </div>
@endsection

@section('scripts')
   <script>
      $(document).ready(function(){
         getQuote();
      });
      
      function getQuote(){
         fetch('https://api.quotable.io/random')
         .then((response) => response.json())
         .then((data) => printQuote(data) );

      }

      function printQuote(quote){
         $(".quote_content").html(quote.content);
         $(".quote_author").html(quote.author);
         let colors = ['primary','secondary','success','warning'];
         let tags = '';
         for(x in quote.tags){
            const color = Math.floor(Math.random() * colors.length);
            tags +=`<span class="badge rounded-pill bg-label-${colors[color]}">#${quote.tags[x]}</span>`;
         }
         $(".quote_tags").html(tags);
         $(".quote_spinner").fadeOut();
      }
   </script>
@endsection