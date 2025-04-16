<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\OrderRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Product;
use App\Entity\Order;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request; // Add this line

final class OrderController extends AbstractController
{
    private $orderRepository;
    private $entityManager;
    private $productRepository;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        ManagerRegistry $doctrine
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/orders', name: 'orders_list')]
    public function index(): Response
    {
        // Fetch all orders and products from the repository
        $orders = $this->orderRepository->findAll();
        $products = $this->productRepository->findAll();

        // Pass orders and products to the template
        return $this->render('order/index.html.twig', [
            'orders' => $orders,
            'products' => $products,
        ]);
    }

    #[Route('/user/orders', name: 'user_order_list')]
    public function userorder(): Response
    {
        // Fetch orders and products from the database
        $orders = $this->orderRepository->findAll();
        $products = $this->productRepository->findAll();

        // Pass orders and products to the template
        return $this->render('order/user.html.twig', [
            'orders' => $orders,
            'products' => $products,
        ]);
    }

    #[Route('/order/add/{product}', name: 'order_add')]
    public function addorder(Product $product): Response
    {
        // Check if the product is out of stock
        if ($product->getQuantite() <= 0) {
            $this->addFlash('error', 'This product is out of stock.');
            return $this->redirectToRoute('user_order_list');
        }

        // Check if the product already exists in an order
        $existingOrder = $this->orderRepository->findOneBy([
            'pname' => $product->getNom(),
            'status' => 'processing....'
        ]);

        if ($existingOrder) {
            // Check if adding another item would exceed the available stock
            if ($existingOrder->getQuantity() >= $product->getQuantite()) {
                $this->addFlash('error', 'You cannot add more of this product. Stock limit reached.');
                return $this->redirectToRoute('user_order_list');
            }

            // Increment the quantity
            $existingOrder->setQuantity($existingOrder->getQuantity() + 1);
            $this->entityManager->persist($existingOrder);
        } else {
            // Create a new order
            $order = new Order();
            $order->setPname($product->getNom());
            $order->setPrix($product->getPrix());
            $order->setStatus('processing....');
            $order->setQuantity(1); // Set initial quantity to 1

            $this->entityManager->persist($order);
        }

        // Decrease the product's available quantity
        $product->setQuantite($product->getQuantite() - 1);
        $this->entityManager->persist($product);

        // Save changes to the database
        $this->entityManager->flush();

        // Add a flash message
        $this->addFlash('success', 'Your order was saved');

        // Redirect to the user order list
        return $this->redirectToRoute('user_order_list');
    }

    #[Route('/order/update/{order}/{status}', name: 'order_statue_update')]
    public function updateOrderStatus(Order $order, $status): Response
    {
        $order->setStatus($status);

        // Save the order
        $this->entityManager->persist($order);
        $this->entityManager->flush();

        // Add a flash message
        $this->addFlash('success', 'Your order status was updated');

        // Redirect to the orders list
        return $this->redirectToRoute('orders_list');
    }

    #[Route('/order/delete/{order}', name: 'order_delete')]
    public function deleteOrder(Order $order): Response
    {
        // Find the associated product
        $product = $this->productRepository->findOneBy(['nom' => $order->getPname()]);

        // If the product exists, increase its quantity
        if ($product) {
            $product->setQuantite($product->getQuantite() + $order->getQuantity());
            $this->entityManager->persist($product);
        }

        // Remove the order
        $this->entityManager->remove($order);
        $this->entityManager->flush();

        // Add a flash message
        $this->addFlash('success', 'Your order was deleted');

        // Redirect to the orders list
        return $this->redirectToRoute('orders_list');
    }
    #[Route('/order/user/delete/{order}', name: 'OOrder_delete1')]
    public function deleteOrder1(Order $order): Response
    {
        // Find the associated product
        $product = $this->productRepository->findOneBy(['nom' => $order->getPname()]);

        // If the product exists, increase its quantity
        if ($product) {
            $product->setQuantite($product->getQuantite() + $order->getQuantity());
            $this->entityManager->persist($product);
        }

        // Remove the order
        $this->entityManager->remove($order);
        $this->entityManager->flush();

        // Add a flash message
        $this->addFlash('success', 'Your order was deleted');

        // Redirect to the orders list
        return $this->redirectToRoute('user_order_list');
    }
    #[Route('/order/increment/{order}', name: 'order_increment', methods: ['POST'])]
    public function incrementOrderQuantity(Order $order, ProductRepository $productRepository, Request $request): Response
    {
        // Validate CSRF token
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('increment' . $order->getId(), $submittedToken)) {
            $this->addFlash('error', 'Invalid CSRF token.');
            return $this->redirectToRoute('user_order_list');
        }
    
        // Find the corresponding product
        $product = $productRepository->findOneBy(['nom' => $order->getPname()]);
    
        // Check if the product is out of stock
        if ($product->getQuantite() <= 0) {
            $this->addFlash('error', 'This product is out of stock.');
            return $this->redirectToRoute('user_order_list');
        }
    
        // Check if adding another item would exceed the available stock
        if (($order->getQuantity() ) > $product->getQuantite()+1) { // Updated logic
            $this->addFlash('error', 'You cannot add more of this product. Stock limit reached.');
            return $this->redirectToRoute('user_order_list');
        }
    
        // Increment the quantity
        $order->setQuantity($order->getQuantity() + 1);
    
        // Decrease the product's available quantity
        $product->setQuantite($product->getQuantite() - 1);
    
        // Save changes to the database
        $this->entityManager->persist($order);
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    
        // Add a flash message
        $this->addFlash('success', 'Quantity incremented successfully.');
    
        // Redirect to the orders list
        return $this->redirectToRoute('user_order_list');
    }
    #[Route('/order/decrement/{order}', name: 'order_decrement', methods: ['POST'])]
public function decrementOrderQuantity(Order $order, ProductRepository $productRepository, Request $request): Response
{
    // Validate CSRF token
    $submittedToken = $request->request->get('_token');
    if (!$this->isCsrfTokenValid('decrement' . $order->getId(), $submittedToken)) {
        $this->addFlash('error', 'Invalid CSRF token.');
        return $this->redirectToRoute('user_order_list');
    }

    // Find the corresponding product
    $product = $productRepository->findOneBy(['nom' => $order->getPname()]);

    // Check if the order quantity is greater than 1 (prevents going below 0)
    if ($order->getQuantity() <= 1) {
        $this->addFlash('error', 'Cannot decrement the quantity further.');
        return $this->redirectToRoute('user_order_list');
    }

    // Decrease the order quantity
    $order->setQuantity($order->getQuantity() - 1);

    // Increase the product's available quantity
    $product->setQuantite($product->getQuantite() + 1);

    // Save changes to the database
    $this->entityManager->persist($order);
    $this->entityManager->persist($product);
    $this->entityManager->flush();

    // Add a flash message
    $this->addFlash('success', 'Quantity decremented successfully.');

    // Redirect to the orders list
    return $this->redirectToRoute('user_order_list');
}
#[Route('/statistiques-commandes', name: 'app_statistiques_commandes')]
public function statistiquesCommandes(): Response
{
    // Récupérer toutes les commandes depuis la base de données
    $orders = $this->entityManager->getRepository(Order::class)->findAll();

    // Calculer le nombre total de commandes
    $totalOrders = count($orders);

    // Calculer les statistiques
    $statistiques = [];
    foreach ($orders as $order) {
        $status = $order->getStatus();
        if (!isset($statistiques[$status])) {
            $statistiques[$status] = 0;
        }
        $statistiques[$status]++;
    }

    // Calculer les pourcentages
    $pourcentages = [];
    foreach ($statistiques as $status => $count) {
        $pourcentages[$status] = ($count / $totalOrders) * 100;
    }

    // Rendre la vue avec les statistiques et les pourcentages
    return $this->render('back/statistiques_commandes.html.twig', [
        'statistiques' => $statistiques,
        'pourcentages' => $pourcentages,
        'totalOrders' => $totalOrders,
    ]);
}
    
}