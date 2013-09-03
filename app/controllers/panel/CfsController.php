<?php

namespace Panel;

use API;
use DataGrid;
use Paginator;
use View;
use Response;

class CfsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $key = $this->user->keys;
        if (count($key) > 0) {

            $primary = $key[0]->key;

            $cfs = API::get('cfs', array('key' => $primary));

            $dataGrid = DataGrid::make($cfs, array('name', 'type', 'mime', 'visibility', 'updated_at', 'created_at'));
            $dataHandler = $dataGrid->getDataHandler();
            if ($results = $dataHandler->getResults()) {
                // Get the amount of pages.
                $pagesCount = $dataHandler->getPagesCount();

                // Calculate the per page.
                $perPage = floor(count($cfs) / $pagesCount);

                // Manually create pagination.
                $paginator = Paginator::make($results, count($cfs), $perPage);

                // Build and output the view.
                return View::make('panel.cfs.index', compact('results', 'paginator'));
            }
        }


        return View::make('panel.cfs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $name
     *
     * @return Response
     */
    public function destroy($name) {
    }
}
