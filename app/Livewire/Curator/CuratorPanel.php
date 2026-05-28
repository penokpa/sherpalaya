<?php

namespace App\Livewire\Curator;

use Awcodes\Curator\Components\Modals\CuratorPanel as BaseCuratorPanel;

class CuratorPanel extends BaseCuratorPanel
{
    public function jumpToPage(int $page): void
    {
        if ($page < 1 || $page > $this->lastPage) {
            return;
        }

        $this->files = $this->getFiles($page);
    }

    public function gotoNextPage(): void
    {
        $this->jumpToPage($this->currentPage + 1);
    }

    public function gotoPrevPage(): void
    {
        $this->jumpToPage($this->currentPage - 1);
    }
}
