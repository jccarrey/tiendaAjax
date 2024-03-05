@extends('shop.base')

@section('contenido')


  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3" id="contenidoAjax">
      <!--<div class="feature col">-->
      <!--  <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">-->
      <!--    <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"/></svg>-->
      <!--  </div>-->
      <!--  <h3 class="fs-2 text-body-emphasis">Featured title</h3>-->
      <!--  <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>-->
      <!--  <a href="#" class="icon-link">-->
      <!--    Call to action-->
      <!--    <svg class="bi"><use xlink:href="#chevron-right"/></svg>-->
      <!--  </a>-->
      <!--</div>-->
    <!--  <div class="feature col">-->
    <!--    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">-->
    <!--      <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"/></svg>-->
    <!--    </div>-->
    <!--    <h3 class="fs-2 text-body-emphasis">Featured title</h3>-->
    <!--    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>-->
    <!--    <a href="#" class="icon-link">-->
    <!--      Call to action-->
    <!--      <svg class="bi"><use xlink:href="#chevron-right"/></svg>-->
    <!--    </a>-->
    <!--  </div>-->
    <!--  <div class="feature col">-->
    <!--    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">-->
    <!--      <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>-->
    <!--    </div>-->
    <!--    <h3 class="fs-2 text-body-emphasis">Featured title</h3>-->
    <!--    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>-->
    <!--    <a href="#" class="icon-link">-->
    <!--      Call to action-->
    <!--      <svg class="bi"><use xlink:href="#chevron-right"/></svg>-->
    <!--    </a>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">-->
    <!--  <div class="feature col">-->
    <!--    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">-->
    <!--      <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"/></svg>-->
    <!--    </div>-->
    <!--    <h3 class="fs-2 text-body-emphasis">Featured title</h3>-->
    <!--    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>-->
    <!--    <a href="#" class="icon-link">-->
    <!--      Call to action-->
    <!--      <svg class="bi"><use xlink:href="#chevron-right"/></svg>-->
    <!--    </a>-->
    <!--  </div>-->
    <!--  <div class="feature col">-->
    <!--    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">-->
    <!--      <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"/></svg>-->
    <!--    </div>-->
    <!--    <h3 class="fs-2 text-body-emphasis">Featured title</h3>-->
    <!--    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>-->
    <!--    <a href="#" class="icon-link">-->
    <!--      Call to action-->
    <!--      <svg class="bi"><use xlink:href="#chevron-right"/></svg>-->
    <!--    </a>-->
    <!--  </div>-->
    <!--  <div class="feature col">-->
    <!--    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">-->
    <!--      <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>-->
    <!--    </div>-->
    <!--    <h3 class="fs-2 text-body-emphasis">Featured title</h3>-->
    <!--    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>-->
    <!--    <a href="#" class="icon-link">-->
    <!--      Call to action-->
    <!--      <svg class="bi"><use xlink:href="#chevron-right"/></svg>-->
    <!--    </a>-->
    <!--  </div>-->
    </div>
    
    <div>
        <nav>
            <ul class="pagination" id="paginacionAjax">
                <!--
                <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>

                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=2">2</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=3">3</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=4">4</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=5">5</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=6">6</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=7">7</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=8">8</a>
                </li>

                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>

                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=150">150</a>
                </li>
                <li class="page-item"><a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=151">151</a>
                </li>

                <li class="page-item">
                    <a class="page-link"
                        href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=2"
                        rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                </li>
                -->
            </ul>
        </nav>

    </div>
    
    <div>
        <!--<nav>-->
        <!--    <ul class="pagination">-->
        <!--        <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">-->
        <!--            <span class="page-link" aria-hidden="true">&lsaquo;</span>-->
        <!--        </li>-->

        <!--        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=2">2</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=3">3</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=4">4</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=5">5</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=6">6</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=7">7</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=8">8</a>-->
        <!--        </li>-->

        <!--        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>-->

        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=150">150</a>-->
        <!--        </li>-->
        <!--        <li class="page-item"><a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=151">151</a>-->
        <!--        </li>-->

        <!--        <li class="page-item">-->
        <!--            <a class="page-link"-->
        <!--                href="https://tfuecru2003.ieszaidinvergeles.es/DWES/argoApp/argoApp/public/paginateartist?orderBy=artist.name&amp;orderType=asc&amp;rowsPerPage=10&amp;page=2"-->
        <!--                rel="next" aria-label="Next &raquo;">&rsaquo;</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--</nav>-->

    </div>
@endsection

@section('script')
  <script src="{{ url('ajaxassets/js/paginateshop.js?rnd=' . rand(0, 1000000) ) }}"></script>
@endsection


