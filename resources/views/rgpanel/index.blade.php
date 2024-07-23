@extends('rgpanel.layout.app')
@section('content')
    <div class="row " style="margin-bottom: 300px">
        <div class="col-xl-8">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Tutorial<span class="badge badge-danger badge-style-light">important</span>
                    </h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">Below we explain how to use RGpanel. You can watch all tutorial
                        playlists by clicking <a
                            href="https://www.youtube.com/watch?v=Jht6cM8XqlI&ab_channel=NMMusicIndonesia"
                            target="_blank">here</a></span>
                    <ol class="text-muted">
                        <li>Convert image <a href="https://www.freeconvert.com/webp-converter" target="_blank">here</a>
                        </li>
                        <li>Max image file size: 2mb</li>
                        <li>IT Support <a target="_blank" href="https://api.whatsapp.com/send?phone=6289512589756">here</a>
                        </li>
                        <li>Playlist tutorial <a
                                href="https://www.youtube.com/playlist?list=PLz7-EJVfFsbL2iHIRiu-GtDFq48BPI9pG"
                                target="_blank">here</a></li>
                    </ol>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/videoseries?si=NKCbLnIEkDdlSBs4&amp;list=PLz7-EJVfFsbL2iHIRiu-GtDFq48BPI9pG"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Notifications<span class="badge badge-info badge-style-light">
                            {{ $prospectiveStudent->count() + $feedbacks->count() }} total</span>
                    </h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">showing feedbacks and prospective students.</span>
                    <ul class="widget-list-content list-unstyled">
                        <li class="widget-list-item widget-list-item-blue">
                            <span class="widget-list-item-icon">
                                <i class="material-icons-outlined">live_help</i>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="{{ route('rgpanel.feedbacks.index', ['locale' => 'en']) }}"
                                    class="widget-list-item-description-title">
                                    Feedbacks
                                </a>
                                <span class="widget-list-item-description-date">
                                    {{ $firstOfMonth->format('d F') }}
                                    -
                                    {{ $endOfMonth->format('d F') }}
                                </span>
                            </span>
                            <span class="widget-list-item-transaction-amount-positive">{{ $feedbacks->count() }}</span>
                        </li>
                        <li class="widget-list-item widget-list-item-blue">
                            <span class="widget-list-item-icon">
                                <i class="material-icons-outlined">how_to_reg</i>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="{{ route('rgpanel.prospective-students.index', ['locale' => 'en']) }}"
                                    class="widget-list-item-description-title">
                                    Prospective Students
                                </a>
                                <span class="widget-list-item-description-date">
                                    {{ $firstOfMonth->format('d F') }}
                                    -
                                    {{ $endOfMonth->format('d F') }}
                                </span>
                            </span>
                            <span
                                class="widget-list-item-transaction-amount-positive">{{ $prospectiveStudent->count() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
