#DESIGN PATTERNS
    
CREATIONAL
==========
    -Abstract Factory (factory definition first, family of related objects)
        -must be subclassed
        - abstract what is common for all classes
        - client calls concrete class
    -Factory Method (without family)
    -Builder (build complex object in steps with common instructions)
    -Prototype (__clone to other slot of memory,delegation)
    -Singleton (class has only one instance, with global point of access)

STRUCTURAL(compositional, logic internal to the structure)
==========================================================
    WRAPPERS:
        -Decorator 
            -smart proxy
            -wrapped in constructor
            -decorate object at run-time,
            -same interface as wrapped class
            -alternative to subclassing)
            -must be a subclass of wrapped interface/object
        -Proxy 
            -surrogate for another object/
            -same interface as wrapped class
            -wrapped may not exist
            -no object in constructor
        -Bridge 
            -more complex variation of adapter
            -decouple an abstraction from implementation/orthogonal

        -Adapter 
            -convert interface into one that clients expect/
            -different interface from wrapped class(derived)
            -exposes only releveant methods to client
        -Facade (
            -higher level interface
            -different interface 
    -Composite (composite/leaf, recursive composition)
    -Flyweight (sharing expensive resources)

BEHAVIORAL (decompositional,external to structure)
==================================================
    ###SENDER/RECEIVER
        -Observer 
            -one to many
            -observer is registered
            -view example
            -query for subject state
            -pull
            
        -Mediator (encapsulates communication between multiple objects)
        -Command (execute command on receiver/send request)
        -Chain (multiple handlers for request/next)
    -Iterator (access aggregate object without internals)
    -Memento (capture objects internal state/for restoring state)
    -State (change behaviour depend on state)
    -Strategy (interchangeable algorithms)
    -Template Method (algorithm skeleton in a base class)
    -Visitor (define new operation without changing classes/recursive structure)
    -Interpreter

