<?php

namespace App\Actions;

use Illuminate\Http\Request;
use TCG\Voyager\Actions\AbstractAction;

class ViewSubscriptionList extends AbstractAction
{
    public function getTitle()
    {
        return 'Visualizar Inscritos';
    }

    public function getIcon()
    {
        return 'voyager-ticket';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-info pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.event-subscriptions.index', 'id='.$this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'events';
    }
}
