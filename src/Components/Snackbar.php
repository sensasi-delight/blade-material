<?php

namespace MaterialBlade\Components;

use Illuminate\Support\HtmlString;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use MaterialBlade\Helper;

class Snackbar extends Component
{
  public string $variant;
  public ?string $message;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(
    string $variant = 'default',
    ?string $message = null
  ) {
    $this->variant = $variant;
    $this->message = $message;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('mbv::snackbar');
  }

  public function validateComponent(HtmlString $slot)
  {
    if (!$this->message && $slot->isEmpty()) {
      throw new \Exception('Please fill the "message" attribute or the component slot', 1);
    }
  }

  public function attributesPreprocess(ComponentAttributeBag $attributes)
  {
    return $attributes->class([
      'mdc-snackbar',
      "mdc-snackbar--$this->variant" => $this->variant !== 'default',
    ]);
  }
}
