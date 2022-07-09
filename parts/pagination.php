<?php $paginationSource = getPaginationSource(); ?>
<?php if($paginationSource['total'] > 1):  ?>
<div class="overflow-hidden py-3">
    <ul class="pagination float-start me-3">
        <?php
            $listClass = 'page-item';
            $listClass .= $paginationSource['current'] == 1 ? ' disabled' : '';
        ?>
        <li class="<?php h($listClass); ?>">
            <a class="page-link" href="<?php h(get_pagenum_link() . 'page/' . ($paginationSource['current'] - 1)); ?>">Prev</a>
        </li>
        <?php for ($p = $paginationSource['start']; $p <= $paginationSource['end']; $p++) : ?>
            <?php
                $listClass = 'page-item';
                $listClass .= $paginationSource['current'] == $p ? ' active' : '';
            ?>
            <li class="<?php h($listClass); ?>">
                <a class="page-link" href="<?php h(get_pagenum_link() . 'page/' . $p); ?>"><?php h($p); ?></a>
            </li>
        <?php endfor; ?>
        <?php
            $listClass = 'page-item';
            $listClass .= $paginationSource['current'] == $paginationSource['total'] ? ' disabled' : '';
        ?>
        <li class="<?php h($listClass); ?>">
            <a class="page-link" href="<?php h(get_pagenum_link() . 'page/' . ($paginationSource['current'] + 1)); ?>">Next</a>
        </li>
    </ul>
    <div class="float-start">
        <input class="text-center" id="target-page" type="number" min="1" max="<?php h($paginationSource['total']); ?>" step="1" value="<?php h($paginationSource['current']); ?>">
        / <?php h($paginationSource['total']); ?>
        <a class="btn btn-primary text-white ms-1" id="target-page-link" href="" data-base-url="<?php h(get_pagenum_link() . 'page/'); ?>">GO</a>
    </div>
</div>
<script>
    const pageLink = document.getElementById('target-page-link');
    const baseUrl = pageLink.getAttribute('data-base-url');
    document.getElementById('target-page').addEventListener('change', (e) => {
        pageLink.href = baseUrl + e.target.value;
    });
</script>
<?php endif; ?>