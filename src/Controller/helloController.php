<?PHP

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class helloController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $contact->setCreateAt(new DateTimeImmutable());
            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('hello_twig');
        }

        return $this->render('hello/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/hello/request", name="hello_request")
     */
    public function helloRequest(Request $request)
    {
        $param = $request->query->all();

        return $this->render('hello/request.html.twig', [
            'param' => $param
        ]);
    }
    /**
     * @Route("/hello/{param}", name="hello_param")
     */
    public function helloParam($param)
    {
        return $this->render('hello/param.html.twig', [
            'param' => $param
        ]);
    }

    /**
     * @Route("/", name="hello_twig")
     */
    public function helloTwig()
    {
        $tab = [
            "Elève 1" => "test",
            "Elève 2" => "test 2",
            "Elève 3" => "test 3",
            "Elève 4" => "test 4",
        ];


        return $this->render('base.html.twig', [
            "key" => "value",
            "Ynov" => "B3 info web dev",
            "tabs" => $tab,
        ]);
    }
    /**
     * @Route("/hello", name="hello")
     */
    public function hello()
    {
        return new Response('hello');
    }
}
