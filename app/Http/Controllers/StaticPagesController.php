<?php

namespace App\Http\Controllers;

use App\Enums\StaticPageContentIdentifier;
use App\Models\StaticPageContent;
use App\Modules\StaticPageContent\ImprintEmptyException;
use Inertia\Response;
use Inertia\ResponseFactory;

class StaticPagesController extends Controller {

    /**
     * @return Response|ResponseFactory
     * @throws ImprintEmptyException
     */
    public function pageImprint (): Response|ResponseFactory {
        return inertia(
            'StaticPages/Imprint',
            [
                'address' => $this->getAddressLines(),
                'contactPhone' => $this->getStaticContent(StaticPageContentIdentifier::IDENTIFIER_IMPRINT_PHONE),
                'contactEmail' => $this->getStaticContent(StaticPageContentIdentifier::IDENTIFIER_IMPRINT_EMAIL),
            ]
        );
    }

    public function pageContact (): Response|ResponseFactory {
        return inertia('StaticPages/Contact', []);
    }

    public function pagePrivacy (): Response|ResponseFactory {
        return inertia('StaticPages/Privacy', []);
    }

    /**
     * @return array
     * @throws ImprintEmptyException
     */
    private function getAddressLines (): array {
        $addressString = StaticPageContent::where('identifier', StaticPageContentIdentifier::IDENTIFIER_IMPRINT_ADDRESS)->first()?->content;

        if (empty($addressString)) {
            throw new ImprintEmptyException();
        }

        return array_map(fn($line) => trim($line), explode("\n", $addressString));
    }

    /**
     * @param StaticPageContentIdentifier $key
     *
     * @return string
     * @throws ImprintEmptyException
     */
    private function getStaticContent (StaticPageContentIdentifier $key): string {
        $data = trim(StaticPageContent::where('identifier', $key)->first()?->content ?: '');
        if (empty($data)) {
            throw new ImprintEmptyException(sprintf('failed retrieving content for static key %s', $key->value));
        }

        return $data;
    }
}
