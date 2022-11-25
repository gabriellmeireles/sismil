<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
      <div class="row text-center align-items-center flex-row-reverse">
        <div class="col-lg-auto ms-lg-auto">
          Desenvolvido pela Subdivisão de Desenvolvimento e Banco de Dados - STI/11ª RM
        </div>
        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
          <ul class="list-inline list-inline-dots mb-0">
            <li class="list-inline-item">
              Copyright &copy; 
              @php
                $initialYear = 2022;
                $currentYear = date('Y');
                if ($initialYear != $currentYear) {
                  echo $initialYear." - ".$currentYear;
                }else{
                  echo $initialYear;
                }
              @endphp 
              - Cmdo 11ª RM
            </li>
          </ul>
        </div>
      </div>
    </div>
</footer>