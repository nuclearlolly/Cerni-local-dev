@extends('layouts.app')

@section('title')
    Frequently Asked Questions
@endsection

@section('content')
    {!! breadcrumbs(['Newbie Guide' => 'faq']) !!}
<h1>NEWBIE GUIDE</h1>
    <div class="paragraph">
        <h6 class="paragraph" style="text-align: center;"> </h6>
            <h3>SPECIES GUIDES (links)</h3>
            <div class="paragraph">
                <div class="paragraph">
                    <div class="card">
                        <div class="card-body">
                            <ul>
                                <li style="text-align: left;"><a href="https://www.corceis.com/info/subguide1">What are Cerni?</a> <br />
                                    <ul>
                                        <li><a href="https://www.corceis.com/info/Anatomy">Anatomy Guide.</a></li>
                                        <li><a href="https://www.corceis.com/world/species/1/traits">Traits.</a></li>
                                        <li><a href="https://www.corceis.com/world/library/book/2">Lore.</a></li>
                                        <li><a href="https://www.corceis.com/world/library/book/3">Magic.</a></li>
                                        <li><a href="https://www.corceis.com/world/info">Locations.</a></li>
                                    </ul>
                                </li>
                                    <li style="text-align: left;"><a href="https://www.corceis.com/info/subguide4">How Traits Work?</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <h5 class="paragraph" style="text-align: center;"> </h5>
            <h3>Site GUIDES (links)</h3>
            <div class="paragraph">
                <div class="paragraph">
                    <div class="card">
                        <div class="card-body">
                            <ul>
                                <li style="text-align: left;"><a href="https://www.corceis.com/info/subguide5">How do I get a cernis?</a><br />
                                    <ul>
                                        <li><a href="https://www.corceis.com/info/subguide5#Breeding">How to breed cernis (and other species)?</a></li>
                                        <li><a href="https://www.corceis.com/info/subguide15">What are Official customs/adopts?</a></li>
                                        <li><a href="https://www.corceis.com/info/subguide9">How do I edit a cerni design?</a></li>
                                    </ul>
                                        </li>
                                            <li style="text-align: left;"><a href="http://localhost/info/PromptGuide">How do prompts work?</a></li>
                                            <li style="text-align: left;"><a href="https://www.corceis.com/info/AboutAwards">What are Achievements?</a></li>
                                            <li style="text-align: left;"><a href="https://www.corceis.com/info/subguide7">How to use Claims?</a></li>
                                            <li style="text-align: left;"><a href="https://www.corceis.com/info/subguide7">How to use Trades?</a></li>
                                    </ul>
                        </div>
                    </div>
                </div>
            </div>
    <hr/>
    <h1>FAQ</h1>
    <p>
        You can search the FAQ by tag, category, or keyword. If you can't find what you're looking for, feel free to reach out to staff.
    </p>

    {{-- search bar --}}
    <div class="form-group">
        {!! Form::text('content', null, ['class' => 'form-control col-md-8 mx-auto', 'id' => 'search', 'placeholder' => 'Search by Keyword(s)']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('tags[]', $tags, null, ['class' => 'form-control col-md-6 mx-auto', 'multiple', 'id' => 'tags', 'placeholder' => 'Select Categories']) !!}
    </div>

    <div id="results" class="mb-3 image-info-box" style="max-height:350px">
        @include('browse._faq_content', ['faqs' => $faqs])
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            @if ($id)
                // open modal
                loadModal('{{ url('faq') }}/modal/{{ $id }}', 'FAQ Question');
            @endif

            // check if there are any tags in the url
            let url = new URL(window.location.href);
            let tags = url.searchParams.get('tags');
            if (tags) {
                search(tags.toLowerCase().split(','));
            }

            $('#tags').selectize({
                maxItems: 5
            });

            // search on keyword change
            $('#search').change(function(e) {
                e.preventDefault();
                let search = $(this).val();
                let tags = $('#tags').val();
                // ajax
                $.ajax({
                    url: '{{ url('faq/search') }}',
                    type: 'GET',
                    data: {
                        content: search,
                        tags: tags
                    },
                    success: function(data) {
                        $('#results').fadeOut(200);
                        $('#results').html(data);
                        $('#results').fadeIn(200);
                    }
                });
            });

            // search on tag change
            $('#tags').change(function(e) {
                e.preventDefault();
                let tags = $(this).val();
                search(tags);
            });

            $('.faq-link').click(function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                loadModal('{{ url('faq') }}/modal/' + id, 'FAQ Question');
            });

            function search(tags = null) {
                // ajax
                let search = $('#search').val();
                if (tags) {
                    // set tags in selectize
                    $('#tags').val(tags);
                }

                $.ajax({
                    url: '{{ url('faq/search') }}',
                    type: 'GET',
                    data: {
                        content: search,
                        tags: tags
                    },
                    success: function(data) {
                        $('#results').fadeOut(200);
                        $('#results').html(data);
                        $('#results').fadeIn(200);
                    }
                });
            }
        });
    </script>
@endsection
